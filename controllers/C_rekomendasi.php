<?php

class C_rekomendasi extends CI_Controller
{
    private $kromosom = array();
    private $childcross1 = array();
    private $childcross2 = array();
    private $childmut = array();
    private $gen = array();
    private $fitness = array();
    private $index = 0;
    private $generasi = array();
    private $fitnessGen = array();

    public function hitungKalori()
    {
        $id_pasien = $this->session->userdata('ses_id');
        // var_dump($id_pasien);
        // $id_pasien= 3;
        $this->load->model('M_pasien');
        $this->load->model('M_makanan');

        $data['pasien'] = $this->M_pasien->getPasien($id_pasien);
        $data['riwayat'] = $this->M_pasien->join($id_pasien);
        $data['rekomendasi'] = $this->M_makanan->getMakanan();

        $this->load->view('rekomendasi/navbar');
        $this->load->view('rekomendasi/index', $data);
    }
    public function simpanHasilRekomendasi()
    {
        $id_makanan = $_POST['id_makanan'];
        $id_riwayat = $this->input->post('id_riwayat');
        $id_pasien = $this->session->userdata('ses_id');
        $data2 = array();
        $index = 0;
        foreach ($id_makanan as $id) {
            array_push($data2, array(
                'id_riwayat' => $id_riwayat,
                'id_makanan' => $id_makanan[$index],
            ));
            $index++;
        }

        $this->load->model('M_pasien');

        $this->M_pasien->tambahdata($data2);
        $this->session->set_flashdata('simpan', '<div class="alert alert-success" role="alert"> <i class="fa fa-check"></i>Makanan Berhasil Disimpan</div>');
        redirect('C_rekomendasi/hitungKalori');
    }
    public function lihatHasilRekomendasi()
    {
        // $awal = microtime(true);
        $panjangMakanan = $_POST['panjang_gen'];
        $kebutuhan_karbohidrat = $this->input->post('kebutuhan_karbohidrat');
        $kebutuhan_protein = $this->input->post('kebutuhan_protein');
        $kebutuhan_lemak = $this->input->post('kebutuhan_lemak');
        $AMB = $this->input->post('AMB');
        $id_riwayat = $this->input->post('id_riwayat');
        $id_pasien = $this->session->userdata('ses_id');
        $data = array(
            'AMB' => $AMB,
            'kebutuhan_karbohidrat' => $kebutuhan_karbohidrat,
            'kebutuhan_protein' => $kebutuhan_protein,
            'kebutuhan_lemak' => $kebutuhan_lemak,
            'id_pasien' => $id_pasien
        );
        $this->load->model('M_pasien');
        $this->M_pasien->tambah($data, 'riwayat_rekomendasi');

        $data['pasien'] = $this->M_pasien->getPasien($id_pasien);
        $data['idRiwayat'] = $this->M_pasien->getIdRiwayat($id_pasien);

//mulai proses algen
        for ($i = 0; $i < $_POST['jumlah_generasi']; $i++) {
            $this->pembentukanKromosom();
            $this->countFitness($this->kromosom, $_POST['jumlah_populasi'], $this->index);
            $this->crossover();
            $this->mutation();
            $this->selection();
        }

        $lastrank = array();
        $best = array();

        //diurutkan kromosom terbaik dari masing2 generasi
        rsort($this->fitnessGen);
        foreach ($this->fitnessGen as $value => $key) {
            array_push($lastrank, $key);
        }
        // echo json_encode($lastrank);
        for ($i = 0; $i < $_POST['jumlah_generasi']; $i++) {
            if ($lastrank[0] == $this->generasi[$i][9]) {
                array_push($this->fitnessGen, $this->generasi[$i][9]);
                array_push($best, $this->generasi[$i]);
                // echo json_encode($this->generasi[$i]);
                // break;
            }
        }

        for ($j = 0; $j < $panjangMakanan; $j++) {
            $data['rekomendasi'][$j] = $this->M_makanan->getMakanan($best[0][$j][0]);
        }

        // echo json_encode($data);
        $this->load->view('rekomendasi/navbar', $data);
        $this->load->view('rekomendasi/index');

        // }
        // $akhir = microtime(true);
        // $lama = $akhir - $awal;
        // echo $lama;
    }
    public function pembentukanKromosom()
    {

        $jumlahPopulasi = $_POST['jumlah_populasi'];
        $panjangMakanan = $_POST['panjang_gen'];
        $idAll = array();
        $this->load->model('M_makanan');
        $idAll = $this->M_makanan->getId();

        foreach ($idAll as $id) {
            $idMakanan[] = $id->id_makanan;
        }

        for ($i = 0; $i < $jumlahPopulasi; $i++) {
            for ($j = 0; $j < $panjangMakanan; $j++) {

                $rand = array_rand($idMakanan, 1);
                $id_makanan[$i][$j] = $idMakanan[$rand];

                //agar tidak ada nilai yang sama
                for ($k = 0; $k < $j; $k++) {
                    while ($id_makanan[$i][$k] == $id_makanan[$i][$j]) {
                        $rand2 = array_rand($idMakanan, 1);
                        $id_makanan[$i][$j] = $idMakanan[$rand2];
                        $k = 0;
                    }
                }

                // echo json_encode(shuffle($id_makanan[$i][$j]));
                $this->gen[$j] = array();

                // pemanggilan isi dari id
                $data['makanan'] = $this->M_makanan->getMakanan($id_makanan[$i][$j]);
                $nama = $data['makanan']->nama_makanan;
                $harga = $data['makanan']->harga;
                $karbo = $data['makanan']->jumlah_karbohidrat;
                $protein = $data['makanan']->jumlah_protein;
                $lemak = $data['makanan']->jumlah_lemak;

                Array_push($this->gen[$j], $id_makanan[$i][$j], $nama, $karbo, $protein, $lemak, $harga);
            }
            Array_push($this->kromosom, $this->gen);
        }
        return $this->kromosom;
    }

    public function countFitness($kromosom, $jumlahPopulasi, $index)
    {
        $_POST;
        $panjangMakanan = $_POST['panjang_gen'];
        $alphaLemak = 5;
        $alphaKarbo = 1;
        $alphaPro = 1;
        // $temp = array(); //fitness sementara

        for ($i = $index; $i < $jumlahPopulasi; $i++) {
            $simpanFitness[$i] = array();
            $penKarbo[$i] = array();
            $penProtein[$i] = array();
            $penLemak[$i] = array();
            $harga[$i] = array();
            for ($j = 0; $j < $panjangMakanan; $j++) {
                // echo json_encode($index);
                array_push($penKarbo[$i], $kromosom[$i][$j][2]);
                array_push($penProtein[$i], $kromosom[$i][$j][3]);
                array_push($penLemak[$i], $kromosom[$i][$j][4]);
                array_push($harga[$i], $kromosom[$i][$j][5]);
            }
            $totalKarbo = array_sum($penKarbo[$i]);
            $totalProtein = array_sum($penProtein[$i]);
            $totalLemak = array_sum($penLemak[$i]);
            $totalHarga = array_sum($harga[$i]);

            $selisihKarbo = abs($_POST['kebutuhan_karbohidrat'] - $totalKarbo);
            $selisihProtein = abs($_POST['kebutuhan_protein'] - $totalProtein);
            if ($totalLemak < $_POST['kebutuhan_lemak']) {
                $selisihLemak = 0;
            } else {
                $selisihLemak = abs($_POST['kebutuhan_lemak'] - $totalLemak);
            }
            $penalti = ($alphaKarbo * $selisihKarbo) + ($alphaPro * $selisihProtein) + ($alphaLemak * $selisihLemak);
            $total = 1000 / ($penalti + $totalHarga);

            array_push($this->fitness, $total);
            array_push($this->kromosom[$i], $total);
        }
        return $this->kromosom;
    }
    public function crossover()
    {
        $parent1 = array();
        $parent2 = array();

        $childA = array();
        $childB = array();
        $cr = $_POST['cr'];
        $panjangMakanan = $_POST['panjang_gen'];
        // echo json_encode($this->kromosom[1]);
        $_POST;
        $jumlahPopulasi = $_POST['jumlah_populasi'];
        // $total = 101;
        $jum_OffSpring = ($cr * $jumlahPopulasi) / 2;

        for ($i = 0; $i < $jum_OffSpring; $i++) {
            $rand1 = mt_rand(0, $jumlahPopulasi - 1);
            array_push($parent1, $this->kromosom[$rand1]);
            $rand2 = mt_rand(0, $jumlahPopulasi - 1);
            array_push($parent2, $this->kromosom[$rand2]);
        }


        for ($i = 0; $i < $jum_OffSpring; $i++) {
            // echo json_encode('mulaiiiiiiiii-----------------------------');
            $random = mt_rand(1, $panjangMakanan);
            // $randomcr = mt_rand(0, 100) / 100;
            //kondisional
            // if ($randomcr < $cr) {
            for ($j = 0; $j < $random; $j++) {
                array_push($childA, $parent1[$i][$j]);
                array_push($childB, $parent2[$i][$j]);
            }
            for ($j = $random; $j < $panjangMakanan; $j++) {
                array_push($childA, $parent2[$i][$j]);
                array_push($childB, $parent1[$i][$j]);
            }
            array_push($this->childcross1, $childA);
            array_push($this->childcross2, $childB);
            // } else {
            //     for ($j = 0; $j < $panjangMakanan; $j++) {
            //         array_push($childA, $parent1[$i][$j]);
            //         array_push($childB, $parent2[$i][$j]);
            //     }
            //     array_push($this->childcross1, $childA);
            //     array_push($this->childcross2, $childB);
            // }

            //repair childcross apabila ada yang sama
            for ($j = 0; $j < $panjangMakanan; $j++) {
                for ($k = 0; $k < $j; $k++) {
                    while ($this->childcross1[$i][$k] == $this->childcross1[$i][$j]) {
                        $x = mt_rand(0, $jumlahPopulasi - 1);
                        $y = mt_rand(0, $panjangMakanan - 1);
                        $this->childcross1[$i][$j] = $this->kromosom[$x][$y];
                        $k = 0;
                    }
                }
            }
            for ($j = 0; $j < $panjangMakanan; $j++) {
                for ($k = 0; $k < $j; $k++) {
                    while ($this->childcross2[$i][$k] == $this->childcross2[$i][$j]) {
                        $x = mt_rand(0, $jumlahPopulasi - 1);
                        $y = mt_rand(0, $panjangMakanan - 1);
                        $this->childcross2[$i][$j] = $this->kromosom[$x][$y];
                        $k = 0;
                    }
                }
            }
            // array_push($this->kromosom, $this->childcross1[$i]);
            // array_push($this->kromosom, $this->childcross2[$i]);

            $childA = array();
            $childB = array();
        }

        // echo json_encode($this->childcross1);
        // echo json_encode($this->childcross2);

        return $this->childcross1;
        return $this->childcross2;
    }
    public function mutation()
    {
        $parent = array();
        // $parent2 = array();

        $n = "\n\n";
        $childB = array();
        $mr = $_POST['mr'];;
        $panjangMakanan = $_POST['panjang_gen'];
        // echo json_encode($this->kromosom[1]);
        $_POST;
        $jumlahPopulasi = $_POST['jumlah_populasi'];
        $offspring = $jumlahPopulasi * $mr;
        // $total = 101;
        //memilih kromosom yang akan dilakukan mutasi
        for ($i = 0; $i < $offspring; $i++) {
            $rand = mt_rand(0, $jumlahPopulasi - 1);
            for ($j = 0; $j < $panjangMakanan; $j++) {
                array_push($this->childmut, $this->kromosom[$rand][$j]);
            }
            array_push($parent, $this->childmut);
            $this->childmut = array();
        }

        //memilih 2 gen yang akan dimutasi
        for ($i = 0; $i < $offspring; $i++) {
            $randgen1 = mt_rand(0, $panjangMakanan - 1);
            $randgen2 = mt_rand(0, $panjangMakanan - 1);
            $temp = $parent[$i][$randgen1];
            $parent[$i][$randgen1] = $parent[$i][$randgen2];
            $parent[$i][$randgen2] = $temp;
            array_push($this->childmut, $parent[$i]);
        }
        // echo json_encode($this->childmut);
    }
    public function selection()
    {
        $jumlahPopulasi = $_POST['jumlah_populasi'];
        $cr = $_POST['cr'];
        $mr = $_POST['mr'];
        $jum_OffSpring = ($cr * $jumlahPopulasi) / 2;
        $offspring = $jumlahPopulasi * $mr;

        //==========batas==========
        for ($i = 0; $i < $jum_OffSpring; $i++) {
            array_push($this->kromosom, $this->childcross1[$i]);
            array_push($this->kromosom, $this->childcross2[$i]);
        }
        for ($i = 0; $i < $offspring; $i++) {
            array_push($this->kromosom, $this->childmut[$i]);
        }
        $count = count($this->kromosom);
        $this->countFitness($this->kromosom, $count, $_POST['jumlah_populasi'] - 1);

        // $in = 0;
        // foreach ($this->kromosom as $hasil) :
        //     $in++;
        //     echo "<center>";
        //     echo "<table bgcolor =Aliceblue border =2>";
        //     echo "</tr>";
        //     echo "<td> Kromosom ", $in, "</td>";
        //     echo "<td> ", $hasil[0][0], "</td>";
        //     echo "<td> ", $hasil[1][0], "</td>";
        //     echo "<td> ", $hasil[2][0], "</td>";
        //     echo "<td> ", $hasil[3][0], "</td>";
        //     echo "<td> ", $hasil[4][0], "</td>";
        //     echo "<td> ", $hasil[5][0], "</td>";
        //     echo "<td> ", $hasil[6][0], "</td>";
        //     echo "<td> ", $hasil[7][0], "</td>";
        //     echo "<td> ", $hasil[8][0], "</td>";
        //     echo "<td> ", $hasil[9], "</td>";

        //     echo "</tr>";
        //     echo "</table>";
        //     echo "</center>";
        // endforeach;
        // echo json_encode("=========================================================");

        $rank = array();
        rsort($this->fitness);
        foreach ($this->fitness as $value => $key) {
            array_push($rank, $key);
            // echo json_encode($rank);
        }

        //kromosom terbaik
        for ($i = 0; $i < $count; $i++) {
            if ($rank[0] == $this->kromosom[$i][9]) {
                array_push($this->fitnessGen, $this->kromosom[$i][9]);
                array_push($this->generasi, $this->kromosom[$i]);

                // $x= (count($this->generasi))-1;
                // echo "Kromosom terbaik";
                // echo "<center>";
                // echo "<table bgcolor =Alicewhite border =2>";
                // echo "</tr>";
                // echo "<td> ", $this->generasi[$x][0][0], "</td>";
                // echo "<td> ", $this->generasi[$x][1][0], "</td>";
                // echo "<td> ", $this->generasi[$x][2][0], "</td>";
                // echo "<td> ", $this->generasi[$x][3][0], "</td>";
                // echo "<td> ", $this->generasi[$x][4][0], "</td>";
                // echo "<td> ", $this->generasi[$x][5][0], "</td>";
                // echo "<td> ", $this->generasi[$x][6][0], "</td>";
                // echo "<td> ", $this->generasi[$x][7][0], "</td>";
                // echo "<td> ", $this->generasi[$x][8][0], "</td>";
                // echo "<td> ", $this->generasi[$x][9], "</td>";
                break;
            }
        }

        $this->kromosom = array();
        $this->fitness = array();
        $this->childcross1 = array();
        $this->childcross2 = array();
        $this->childmut = array();

        return $this->generasi;
    }
}
