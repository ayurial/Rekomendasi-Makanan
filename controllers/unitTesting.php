<?php
class unitTesting extends CI_Controller
{
    private $kromosom = array();
    private $childcross1 = array();
    private $childcross2 = array();
    private $childmut = array();
    private $gen = array();
    private $fitness = array();
    // private $jumlahPopulasi = 100;
    private $index = 0;
    private $generasi = array();
    private $fitnessGen = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
    }
    private function tambahMakanan()
    {
        $nama_makanan = "coklat";
        $jenis_makanan = "10";
        $jumlah_karbohidrat = "10";
        $jumlah_protein = "10";
        $jumlah_lemak = "10";
        $harga = "";
        if (!empty($nama_makanan) && !empty($jenis_makanan) && !empty($jumlah_karbohidrat) && !empty($jumlah_protein) && !empty($jumlah_lemak) && !empty($harga)) {
            $data = array(
                'jenis_makanan' => $jenis_makanan,
                'nama_makanan' => $nama_makanan,
                'jumlah_karbohidrat' => $jumlah_karbohidrat,
                'jumlah_protein' => $jumlah_protein,
                'jumlah_lemak' => $jumlah_lemak,
                'harga' => $harga
                // 'deskripsi' => $deskripsi

            );

            // $this->load->model('M_makanan');
            // $this->M_makanan->addMakanan($data, 'makanan');

            // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><i class="fa fa-check"></i>Data Makanan Berhasil Ditambahkan</div>');
            return "makanan berhasil ditambahkan";
            // redirect('C_makanan/lihatDaftarMakanan');
        } else {
            return "data harus diisi";
        }
    }
    public function testTambahMakanan()
    {
        $t = $this->tambahMakanan();
        $expected_result = "data harus diisi";
        $test_name = "Tambah Makanan";
        echo $this->unit->run($t, $expected_result, $test_name);
    }

    
    public function lihatDetailPasien($id_pasien)
    {
        $this->load->model('M_pasien');
        $data['pasien'] = $this->M_pasien->getRiwayatMakanan($id_pasien);
        $data['biodatapasien'] = $this->M_pasien->getData($id_pasien);

        // echo json_encode($data['pasien']);
        $this->load->view('pasien/navbar');
        return $this->load->view('pasien/detailPasien', $data);
    }

    public function testLihatDetail()
    {
        $t = $this->lihatDetailPasien(4);
        $expected_result = $this->load->view('pasien/detailPasien');
        $test_name = "Tambah Makanan";
        echo $this->unit->run($t, $expected_result, $test_name);
    }


    public function lihatHasilRekomendasi($panjangMakanan, $jumlah_generasi)
    {
        $jumlahPopulasi = 100;
        $kebutuhan_karbohidrat = 232;
        $kebutuhan_protein = 89;
        $kebutuhan_lemak = 15;
        $AMB = 1430;
        $id_pasien = 4;
        $data = array(
            'AMB' => $AMB,
            'kebutuhan_karbohidrat' => $kebutuhan_karbohidrat,
            'kebutuhan_protein' => $kebutuhan_protein,
            'kebutuhan_lemak' => $kebutuhan_lemak,
            'id_pasien' => $id_pasien
        );
        $this->load->model('M_pasien');
        // $this->M_pasien->tambah($data, 'riwayat_rekomendasi');
        $data['pasien'] = $this->M_pasien->getPasien($id_pasien);
        $data['idRiwayat'] = $this->M_pasien->getIdRiwayat($id_pasien);
        if ($jumlah_generasi <= 0 || $panjangMakanan <= 0) {
        } else {
            for ($i = 0; $i < $jumlah_generasi; $i++) {
                $this->pembentukanKromosom($panjangMakanan);
                $this->countFitness($this->kromosom, $jumlahPopulasi, $this->index, $panjangMakanan);
                $this->crossover($panjangMakanan);
                $this->mutation($panjangMakanan);
                $this->selection($panjangMakanan, $jumlahPopulasi);
            }
            $lastrank = array();
            $best = array();
            rsort($this->fitnessGen);
            foreach ($this->fitnessGen as $value => $key) {
                array_push($lastrank, $key);
            }
            for ($i = 0; $i < $jumlah_generasi; $i++) {
                if ($lastrank[0] == $this->generasi[$i][9]) {
                    array_push($this->fitnessGen, $this->generasi[$i][9]);
                    array_push($best, $this->generasi[$i]);
                }
            }

            for ($j = 0; $j < $panjangMakanan; $j++) {
                $data['rekomendasi'][$j] = $this->M_makanan->getMakanan($best[0][$j][0]);
            }


            $this->load->view('rekomendasi/navbar', $data);
            return $this->load->view('rekomendasi/index');
        }
    }
    public function pembentukanKromosom($panjangMakanan)
    {
        $jumlahPopulasi = 100;
        $total = 101;
        $cek = 0;
        $idAll = array();
        $this->load->model('M_makanan');
        $idAll = $this->M_makanan->getId();
        // $id= $data['makanan']->id_makanan;
        foreach ($idAll as $id) {
            $idMakanan[] = $id->id_makanan;
        }
        for ($i = 0; $i < $jumlahPopulasi; $i++) {
            for ($j = 0; $j < $panjangMakanan; $j++) {
                $rand = array_rand($idMakanan, 1);
                $id_makanan[$i][$j] = $idMakanan[$rand];

                for ($k = 0; $k < $j; $k++) {
                    while ($id_makanan[$i][$k] == $id_makanan[$i][$j]) {
                        $rand2 = array_rand($idMakanan, 1);
                        $id_makanan[$i][$j] = $idMakanan[$rand2];
                        $k = 0;
                    }
                }
                $this->gen[$j] = array();
                $data['makanan'] = $this->M_makanan->getMakanan($id_makanan[$i][$j]);
                $harga = $data['makanan']->harga;
                $karbo = $data['makanan']->jumlah_karbohidrat;
                $protein = $data['makanan']->jumlah_protein;
                $lemak = $data['makanan']->jumlah_lemak;

                Array_push($this->gen[$j], $id_makanan[$i][$j], $karbo, $protein, $lemak, $harga);

            }
            Array_push($this->kromosom, $this->gen);
        }
        return $this->kromosom;
    }

    public function countFitness($kromosom, $jumlahPopulasi, $index, $panjangMakanan)
    {
        $kebutuhan_karbohidrat = 232;
        $kebutuhan_protein = 89;
        $kebutuhan_lemak = 15;
        $AMB = 1430;
        $alphaLemak = 5;
        $alphaKarbo = 1;
        $alphaPro = 1;
        for ($i = $index; $i < $jumlahPopulasi; $i++) {
            $simpanFitness[$i] = array();
            $penKarbo[$i] = array();
            $penProtein[$i] = array();
            $penLemak[$i] = array();
            $harga[$i] = array();
            for ($j = 0; $j < $panjangMakanan; $j++) {
                // echo json_encode($index);
                array_push($penKarbo[$i], $kromosom[$i][$j][1]);
                array_push($penProtein[$i], $kromosom[$i][$j][2]);
                array_push($penLemak[$i], $kromosom[$i][$j][3]);
                array_push($harga[$i], $kromosom[$i][$j][4]);
            }
            $totalKarbo = array_sum($penKarbo[$i]);
            $totalProtein = array_sum($penProtein[$i]);
            $totalLemak = array_sum($penLemak[$i]);
            $totalHarga = array_sum($harga[$i]);

            $selisihKarbo = abs($kebutuhan_karbohidrat - $totalKarbo);
            $selisihProtein = abs($kebutuhan_protein - $totalProtein);
            if ($totalLemak < $kebutuhan_lemak) {
                $selisihLemak = 0;
            } else {
                $selisihLemak = abs($kebutuhan_lemak - $totalLemak);
            }
            $penalti = ($alphaKarbo * $selisihKarbo) + ($alphaPro * $selisihProtein) + ($alphaLemak * $selisihLemak);
            $total = 1000 / ($penalti + $totalHarga);

            array_push($this->fitness, $total);
            array_push($this->kromosom[$i], $total);
        }
        // echo json_encode($this->kromosom);
        return $this->kromosom;
    }
    public function crossover($panjangMakanan)
    {
        $parent1 = array();
        $parent2 = array();

        // $n = "\n\n";
        $childA = array();
        $childB = array();
        $cr = 0.7;
        $_POST;
        $jumlahPopulasi = 100;
        // $total = 101;
        for ($i = 0; $i < 35; $i++) {
            $rand1 = mt_rand(0, $jumlahPopulasi - 1);
            array_push($parent1, $this->kromosom[$rand1]);
            $rand2 = mt_rand(0, $jumlahPopulasi - 1);
            array_push($parent2, $this->kromosom[$rand2]);
        }


        for ($i = 0; $i < 35; $i++) {
            $random = mt_rand(1, $panjangMakanan);
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

            $childA = array();
            $childB = array();
        }

        // echo json_encode($this->childcross1);
        // echo json_encode($this->childcross2);

        return $this->childcross1;
        return $this->childcross2;
    }
    public function mutation($panjangMakanan)
    {
        $parent = array();
        // $parent2 = array();

        $n = "\n\n";
        $childB = array();
        $mr = 0.3;
        $jumlahPopulasi = 100;
        $offspring = $jumlahPopulasi * $mr;
        // $total = 101;
        for ($i = 0; $i < $offspring; $i++) {
            $rand = mt_rand(0, $jumlahPopulasi - 1);
            for ($j = 0; $j < $panjangMakanan; $j++) {
                array_push($this->childmut, $this->kromosom[$rand][$j]);
            }
            array_push($parent, $this->childmut);
            $this->childmut = array();
        }

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
    public function selection($panjangMakanan, $jumlahPopulasi)
    {
        for ($i = 0; $i < 35; $i++) {
            array_push($this->kromosom, $this->childcross1[$i]);
            array_push($this->kromosom, $this->childcross2[$i]);
        }
        for ($i = 0; $i < 30; $i++) {
            array_push($this->kromosom, $this->childmut[$i]);
        }
        $count = count($this->kromosom);
        $this->countFitness($this->kromosom, $count, $jumlahPopulasi - 1, $panjangMakanan);

        $rank = array();
        rsort($this->fitness);
        foreach ($this->fitness as $value => $key) {
            array_push($rank, $key);
            // echo json_encode($rank);
        }
        for ($i = 0; $i < $count; $i++) {
            if ($rank[0] == $this->kromosom[$i][9]) {
                array_push($this->fitnessGen, $this->kromosom[$i][9]);
                array_push($this->generasi, $this->kromosom[$i]);
                break;
            }
        }
        $this->kromosom = array();
        $this->fitness = array();
        $this->childcross1 = array();
        $this->childcross2 = array();
        $this->childmut = array();
        // echo json_encode($this->fitness);
        // echo json_encode('======================================================================');
        // echo json_encode($this->generasi);
        // echo json_encode($this->parent1[0][1][0]);
        return $this->generasi;
    }

    public function testLihatHasilRekomendasi()
    {
        $t = $this->lihatHasilRekomendasi(9, 0);
        $expected_result = null;
        $test_name = "lihat hasil rekomendasi";
        echo $this->unit->run($t, $expected_result, $test_name);
    }
}
