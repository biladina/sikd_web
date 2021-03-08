<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\helpers\Json;
use yii\console\ExitCode;
use yii2tech\spreadsheet\Spreadsheet;
use yii\data\ActiveDataProvider;

class BelanjaController extends Controller
{
    public function actionFungsi()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/fungsi.json'));
        $fungsi = Json::decode($json);

        foreach($fungsi as $fungsi)
        {
            $model = new \app\models\Fungsi();

            $model->kode_fungsi = (strlen((string)$fungsi['kode_fungsi']) > 1) ? (string)$fungsi['kode_fungsi'] : (string)'0'.$fungsi['kode_fungsi'];
            $model->kode_sub_fungsi = (strlen((string)$fungsi['kode_sub_fungsi']) > 1) ? (string)$fungsi['kode_sub_fungsi'] : (string)'0'.$fungsi['kode_sub_fungsi'];
            $model->kode_urusan = (string)$fungsi['kode_urusan'];
            $model->kode_bidang = (strlen((string)$fungsi['kode_bidang']) > 1) ? (string)$fungsi['kode_bidang'] : (string)'0'.$fungsi['kode_bidang'];
            $model->sub_fungsi = $fungsi['sub_fungsi'];
            $model->fungsi = $fungsi['fungsi'];

            if($model->save())
            {
                echo "saved";
            }
        }
    }

	public function actionSkpd()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/skpd.json'));
        $skpd = Json::decode($json);

        foreach($skpd as $skpd)
        {
        	$model = new \app\models\Skpd();

        	$model->id_unit = $skpd['id_unit'];
        	$model->id_skpd = $skpd['id_skpd'];
        	$model->kode_skpd = $skpd['kode_skpd'];
        	$model->nama_skpd = $skpd['nama_skpd'];
        	$model->kunci_skpd = $skpd['kunci_skpd'];
        	$model->id_setup_unit = $skpd['id_setup_unit'];
        	$model->is_skpd = $skpd['is_skpd'];
        	$model->posisi = $skpd['posisi'];
        	$model->status = $skpd['status'];

        	if($model->save())
        	{
        		echo "saved";
        	}
        }
    }

    public function actionSubKegiatan()
    {
    	$json = file_get_contents(Yii::getAlias('@app/commands/json/sub_kegiatan.json'));
        $sub_kegiatan = Json::decode($json);

        // $data_sub = [];
        // foreach($sub_kegiatan as $sub_kegiatan)
        // {
        //     $data_sub[] = [
        //         'id_urusan' => $sub_kegiatan['id_urusan'],
        //         'kode_urusan' => $sub_kegiatan['kode_urusan'],
        //         'nama_urusan' => $sub_kegiatan['nama_urusan'],
        //         'id_bidang_urusan' => $sub_kegiatan['id_bidang_urusan'],
        //         'kode_bidang_urusan' => $sub_kegiatan['kode_bidang_urusan'],
        //         'nama_bidang_urusan' => $sub_kegiatan['nama_bidang_urusan'],
        //         'id_program' => $sub_kegiatan['id_program'],
        //         'kode_program' => $sub_kegiatan['kode_program'],
        //         'nama_program' => $sub_kegiatan['nama_program'],
        //         'id_giat' => $sub_kegiatan['id_giat'],
        //         'kode_giat' => $sub_kegiatan['kode_giat'],
        //         'nama_giat' => $sub_kegiatan['nama_giat'],
        //         'id_sub_giat' => $sub_kegiatan['id_sub_giat'],
        //         'kode_sub_giat' => $sub_kegiatan['kode_sub_giat'],
        //         'nama_sub_giat' => $sub_kegiatan['nama_sub_giat'],
        //         'is_locked' => $sub_kegiatan['is_locked'],
        //         'status' => $sub_kegiatan['status']
        //     ];
        // }

        // Yii::$app->db->createCommand()
        //     ->batchInsert(\app\models\SubKegiatan::tableName(),
        //     [
        //         'id_urusan',
        //         'kode_urusan',
        //         'nama_urusan',
        //         'id_bidang_urusan',
        //         'kode_bidang_urusan',
        //         'nama_bidang_urusan',
        //         'id_program',
        //         'kode_program',
        //         'nama_program',
        //         'id_giat',
        //         'kode_giat',
        //         'nama_giat',
        //         'id_sub_giat',
        //         'kode_sub_giat',
        //         'nama_sub_giat',
        //         'is_locked',
        //         'status'
        //     ], $data_sub)
        //     ->execute();


        foreach($sub_kegiatan as $sub_kegiatan)
        {
        	$model = new \app\models\SubKegiatan();

        	$model->id_urusan = $sub_kegiatan['id_urusan'];
        	$model->kode_urusan = $sub_kegiatan['kode_urusan'];
        	$model->nama_urusan = $sub_kegiatan['nama_urusan'];
        	$model->id_bidang_urusan = $sub_kegiatan['id_bidang_urusan'];
        	$model->kode_bidang_urusan = $sub_kegiatan['kode_bidang_urusan'];
        	$model->nama_bidang_urusan = $sub_kegiatan['nama_bidang_urusan'];
        	$model->id_program = $sub_kegiatan['id_program'];
        	$model->kode_program = $sub_kegiatan['kode_program'];
        	$model->nama_program = $sub_kegiatan['nama_program'];
        	$model->id_giat = $sub_kegiatan['id_giat'];
        	$model->kode_giat = $sub_kegiatan['kode_giat'];
        	$model->nama_giat = $sub_kegiatan['nama_giat'];
        	$model->id_sub_giat = $sub_kegiatan['id_sub_giat'];
        	$model->kode_sub_giat = $sub_kegiatan['kode_sub_giat'];
        	$model->nama_sub_giat = $sub_kegiatan['nama_sub_giat'];
        	$model->is_locked = $sub_kegiatan['is_locked'];
        	$model->status = $sub_kegiatan['status'];

        	if($model->save())
        	{
        		echo "saved";
        	}
        }
    }

    public function actionUrusanBidang()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/urusan_bidang.json'));
        $urusan_bidang = Json::decode($json);

        foreach($urusan_bidang as $urusan_bidang)
        {
            $model = new \app\models\UrusanBidang();
            $model->id_bidang_urusan = $urusan_bidang['id_bidang_urusan'];
            $model->tahun = $urusan_bidang['tahun'];
            $model->id_daerah = $urusan_bidang['id_daerah'];
            $model->id_urusan = $urusan_bidang['id_urusan'];
            $model->id_fungsi = $urusan_bidang['id_fungsi'];
            $model->kode_urusan = $urusan_bidang['kode_urusan'];
            $model->nama_urusan = $urusan_bidang['nama_urusan'];
            $model->kode_bidang_urusan = $urusan_bidang['kode_bidang_urusan'];
            $model->nama_bidang_urusan = $urusan_bidang['nama_bidang_urusan'];
            $model->id_unik = $urusan_bidang['id_unik'];
            $model->is_locked = $urusan_bidang['is_locked'];
            $model->created_user = $urusan_bidang['created_user'];
            $model->created_at = $urusan_bidang['created_at'];
            $model->status = $urusan_bidang['status'];

            if($model->save())
            {
                echo "saved";
            }
        }
    }

    public function actionAkunBelanja()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/akun_belanja.json'));
        $akun_belanja = Json::decode($json);

        foreach($akun_belanja as $akun_belanja)
        {
            $model = new \app\models\AkunBelanja();
            $model->id_akun = $akun_belanja['id_akun'];
            $model->tahun = $akun_belanja['tahun'];
            $model->id_daerah = $akun_belanja['id_daerah'];
            $model->kode_akun = $akun_belanja['kode_akun'];
            $model->nama_akun = $akun_belanja['nama_akun'];
            $model->is_pendapatan = $akun_belanja['is_pendapatan'];
            $model->is_bl = $akun_belanja['is_bl'];
            $model->is_pembiayaan = $akun_belanja['is_pembiayaan'];
            $model->id_unik = $akun_belanja['id_unik'];
            $model->is_locked = $akun_belanja['is_locked'];
            $model->set_input = $akun_belanja['set_input'];
            $model->set_lokus = $akun_belanja['set_lokus'];
            $model->is_gaji_asn = $akun_belanja['is_gaji_asn'];
            $model->is_barjas = $akun_belanja['is_barjas'];
            $model->is_bunga = $akun_belanja['is_bunga'];
            $model->is_subsidi = $akun_belanja['is_subsidi'];
            $model->is_bagi_hasil = $akun_belanja['is_bagi_hasil'];
            $model->is_bankeu_umum = $akun_belanja['is_bankeu_umum'];
            $model->is_bankeu_khusus = $akun_belanja['is_bankeu_khusus'];
            $model->is_btt = $akun_belanja['is_btt'];
            $model->is_hibah_brg = $akun_belanja['is_hibah_brg'];
            $model->is_hibah_uang = $akun_belanja['is_hibah_uang'];
            $model->is_sosial_brg = $akun_belanja['is_sosial_brg'];
            $model->is_sosial_uang = $akun_belanja['is_sosial_uang'];
            $model->is_bos = $akun_belanja['is_bos'];
            $model->is_modal_tanah = $akun_belanja['is_modal_tanah'];
            $model->status = $akun_belanja['status'];
            $model->belanja = $akun_belanja['belanja'];

            if($model->save())
            {
                echo "saved";
            }
        }
    }

    public function actionBelanja()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/belanja.json'));
        $belanja = Json::decode($json);

        foreach($belanja as $belanja)
        {
            $model = new \app\models\Belanja();
            $model->id_urusan = $belanja['id_urusan'];
            $model->kode_urusan = $belanja['kode_urusan'];
            $model->nama_urusan = $belanja['nama_urusan'];
            $model->id_bidang_urusan = $belanja['id_bidang_urusan'];
            $model->kode_bidang_urusan = $belanja['kode_bidang_urusan'];
            $model->nama_bidang_urusan = $belanja['nama_bidang_urusan'];
            $model->id_program = $belanja['id_program'];
            $model->kode_program = $belanja['kode_program'];
            $model->nama_program = $belanja['nama_program'];
            $model->kode_skpd = $belanja['kode_skpd'];
            $model->nama_skpd = $belanja['nama_skpd'];
            $model->kode_sub_skpd = $belanja['kode_sub_skpd'];
            $model->nama_sub_skpd = $belanja['nama_sub_skpd'];
            $model->id_giat = $belanja['id_giat'];
            $model->kode_giat = $belanja['kode_giat'];
            $model->nama_giat = $belanja['nama_giat'];
            $model->id_sub_giat = $belanja['id_sub_giat'];
            $model->kode_sub_giat = $belanja['kode_sub_giat'];
            $model->nama_sub_giat = $belanja['nama_sub_giat'];
            $model->kode_akun = $belanja['kode_akun'];
            $model->nama_akun = $belanja['nama_akun'];
            $model->rincian = $belanja['rincian'];

            if($model->save())
            {
                echo "saved";
            }
        }
    }

    public function actionExcel()
    {
        $exporter = new Spreadsheet([
            'dataProvider' => new ActiveDataProvider([
                'query' => \app\models\Belanja::find()->andWhere('rincian != 0'),
            ]),
            'columns' => [
                [
                    'attribute' => 'kode_urusan',
                    'label' => 'kodeUrusanProgram'
                ],
                [
                    'attribute' => 'nama_urusan',
                    'label' => 'namaUrusanProgram',
                    'value' => function($model) {return substr($model->nama_urusan, 2);}
                ],
                [
                    'attribute' => 'kode_bidang_urusan',
                    'label' => 'kodeUrusanPelaksana'
                ],
                [
                    'attribute' => 'nama_bidang_urusan',
                    'label' => 'namaUrusanPelaksana',
                    'value' => function($model) {return substr($model->nama_bidang_urusan, 5);}
                ],
                [
                    'attribute' => 'kode_skpd',
                    'label' => 'kodeSKPD',
                ],
                [
                    'attribute' => 'nama_skpd',
                    'label' => 'namaSKPD',
                    'value' => function($model) {return substr($model->nama_skpd, 22);}
                ],
                [
                    'attribute' => 'kode_program',
                    'label' => 'kodeProgram',
                    'value' => function($model) {return '0'.substr($model->kode_program, 5);}
                ],
                [
                    'attribute' => 'nama_program',
                    'label' => 'namaProgram',
                    'value' => function($model) {return substr($model->nama_program, 8);}
                ],
                [
                    'attribute' => 'kode_sub_giat',
                    'label' => 'kodeKegiatan',
                    'value' => function($model) {return '0'.str_replace(".","", substr($model->kode_sub_giat, 8));}
                ],
                [
                    'attribute' => 'nama_giat',
                    'label' => 'namaKegiatan',
                    'value' => function($model) {return substr($model->nama_giat, 13).'|'.substr($model->nama_sub_giat, 16);}
                ],
                [
                    'label' => 'kodeFungsi',
                    'value' => function($model) {
                        $kode_urusan = substr($model->kode_bidang_urusan, 0, 1);
                        $kode_bidang = substr($model->kode_bidang_urusan, 2, 2);
                        return $this->kode_fungsi($kode_urusan, $kode_bidang);
                    }
                ],
                [
                    'label' => 'namaFungsi',
                    'value' => function($model) {
                        $kode_urusan = substr($model->kode_bidang_urusan, 0, 1);
                        $kode_bidang = substr($model->kode_bidang_urusan, 2, 2);
                        return $this->fungsi($kode_urusan, $kode_bidang);
                    }
                ],
                [
                    'label' => 'kodeAkunUtama',
                    'value' => function($model) {return substr($model->kode_akun, 0, 1);}
                ],
                [
                    'label' => 'namaAkunUtama',
                    'value' => function($model) {
                        return $this->akun(substr($model->kode_akun, 0, 1));
                    }
                ],
                [
                    'label' => 'kodeAkunKelompok',
                    'value' => function($model) {return substr($model->kode_akun, 2, 3);}
                ],
                [
                    'label' => 'namaAkunKelompok',
                    'value' => function($model) {
                        return $this->akun(substr($model->kode_akun, 0, 3));
                    }
                ],
                [
                    'label' => 'kodeAkunJenis',
                    'value' => function($model) {return substr($model->kode_akun, 4, 2);}
                ],
                [
                    'label' => 'namaAkunJenis',
                    'value' => function($model) {
                        return $this->akun(substr($model->kode_akun, 0, 6));
                    }
                ],
                [
                    'label' => 'kodeAkunObjek',
                    'value' => function($model) {return substr($model->kode_akun, 7, 2);}
                ],
                [
                    'label' => 'namaAkunObjek',
                    'value' => function($model) {
                        return $this->akun(substr($model->kode_akun, 0, 9));
                    }
                ],
                [
                    'label' => 'kodeAkunRincian',
                    'value' => function($model) {return substr($model->kode_akun, 10, 2);}
                ],
                [
                    'label' => 'namaAkunRincian',
                    'value' => function($model) {
                        return $this->akun(substr($model->kode_akun, 0, 12));
                    }
                ],
                [
                    'label' => 'kodeAkunSub',
                    'value' => function($model) {return substr($model->kode_akun, 13, 4);}
                ],
                [
                    'attribute' => 'nama_akun',
                    'label' => 'namaAkunSub',
                    'value' => function($model) {
                        return substr($model->nama_akun, 17);
                    }
                ],
                [
                    'attribute' => 'rincian',
                    'label' => 'nilaiAnggaran'
                ],
            ],
        ]);
        
        $exporter->save(Yii::getAlias('@app/commands/excel/apbd.xls'));
    }

    public function akun($kode_akun)
    {
        $akun = \app\models\AkunBelanja::find()->where(['kode_akun' => $kode_akun])->one();

        return $akun->nama_akun;
    }

    public function kode_fungsi($kode_urusan, $kode_bidang)
    {
        $fungsi = \app\models\Fungsi::find()->where(['kode_urusan' => $kode_urusan, 'kode_bidang' => $kode_bidang])->one();

        return (string)$fungsi->kode_fungsi.''.$fungsi->kode_sub_fungsi;
    }

    public function fungsi($kode_urusan, $kode_bidang)
    {
        $fungsi = \app\models\Fungsi::find()->where(['kode_urusan' => $kode_urusan, 'kode_bidang' => $kode_bidang])->one();

        return $fungsi->fungsi.'|'.$fungsi->sub_fungsi;
    }
}