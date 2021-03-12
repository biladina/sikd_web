<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\helpers\Json;
use yii\console\ExitCode;
use yii2tech\spreadsheet\Spreadsheet;
// use yii2tech\csvgrid\CsvGrid;
use yii\data\ActiveDataProvider;

class BelanjaPaketController extends Controller
{
	public function actionExcelBelanjaPaket()
    {
        $exporter = new Spreadsheet([
          //   'dataProvider' => new ActiveDataProvider([
          //       'query' => \app\models\SubKegiatanBelanjaPaket::find(),
          //       'pagination' => [
		        //     'pageSize' => 500,
		        // ],
          //   ]),
            'query' => \app\models\SubKegiatanBelanjaPaket::find(),
            'batchSize' => 2000,
            'columns' => [
                [
                    'attribute' => 'kode_urusan',
                    'label' => 'kodeUrusanProgram'
                ],
                [
                    'attribute' => 'nama_urusan',
                    'label' => 'namaUrusanProgram',
                ],
                [
                    'label' => 'kodeUrusanPelaksana',
                    'value' => function($model) {
                        return substr($model->kode_skpd, 0, 4);
                    }
                ],
                [
                    'label' => 'namaUrusanPelaksana',
                    'value' => function($model) {
                        return $this->urusan_bidang(substr($model->kode_skpd, 0, 4));
                    }
                ],
                [
                    'attribute' => 'kode_skpd',
                    'label' => 'kodeSKPD',
                ],
                [
                    'attribute' => 'nama_skpd',
                    'label' => 'namaSKPD',
                ],
                [
                    'attribute' => 'kode_program',
                    'label' => 'kodeProgram',
                    'value' => function($model) {return (string)'0'.substr($model->kode_program, 5).' ';}
                ],
                [
                    'attribute' => 'nama_program',
                    'label' => 'namaProgram',
                ],
                [
                    'attribute' => 'kode_sub_giat',
                    'label' => 'kodeKegiatan',
                    'value' => function($model) {return (string)'0'.str_replace(".","", substr($model->kode_sub_giat, 8)).' ';}
                ],
                [
                    'attribute' => 'nama_giat',
                    'label' => 'namaKegiatan',
                    'value' => function($model) {return $model->nama_giat.'|'.$model->nama_sub_giat;}
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
                    'attribute' => 'subs_bl_teks',
                    'label' => 'paket',
                    'value' => function($model) {
                        return substr($model->subs_bl_teks, 3);
                    }
                ],
                [
                    'attribute' => 'ket_bl_teks',
                    'label' => 'keterangan_paket',
                    'value' => function($model) {
                        return substr($model->ket_bl_teks, 3);
                    }
                ],
                [
                    'attribute' => 'kode_standar_harga',
                    'label' => 'kode_ssh'
                ],
                [
                    'attribute' => 'nama_komponen',
                    'label' => 'nama_ssh'
                ],
                [
                    'attribute' => 'spek_komponen',
                    'label' => 'spesifikasi_ssh'
                ],
                [
                    'attribute' => 'volume',
                    'label' => 'volume'
                ],
                [
                    'attribute' => 'satuan',
                    'label' => 'satuan'
                ],
                [
                    'attribute' => 'harga_satuan',
                    'label' => 'harga_satuan'
                ],
                [
                    'attribute' => 'rincian',
                    'label' => 'nilaiAnggaran'
                ],
            ],
        ]);
        
        // $exporter->export()->saveAs(Yii::getAlias('@app/commands/excel/belanja_paket.csv'));
        $exporter->save(Yii::getAlias('@app/commands/excel/belanja_paket.xls'));
    }

    private function urusan_bidang($urusan_bidang)
    {
        $urusan_bidang = \app\models\UrusanBidang::find()->where(['kode_bidang_urusan' => $urusan_bidang])->one();

        return substr($urusan_bidang->nama_urusan, 2);;
    }

    private function akun($kode_akun)
    {
        $akun = \app\models\AkunBelanja::find()->where(['kode_akun' => $kode_akun])->one();

        return $akun->nama_akun;
    }

    private function kode_fungsi($kode_urusan, $kode_bidang)
    {
        $fungsi = \app\models\Fungsi::find()->where(['kode_urusan' => $kode_urusan, 'kode_bidang' => $kode_bidang])->one();

        return (string)$fungsi->kode_fungsi.''.$fungsi->kode_sub_fungsi;
    }

    private function fungsi($kode_urusan, $kode_bidang)
    {
        $fungsi = \app\models\Fungsi::find()->where(['kode_urusan' => $kode_urusan, 'kode_bidang' => $kode_bidang])->one();

        return $fungsi->fungsi.'|'.$fungsi->sub_fungsi;
    }

    private function skpd($id_skpd, $mode)
    {
    	$skpd = \app\models\Skpd::findOne(['id_skpd' => $id_skpd]);

    	if($mode == "kode_skpd")
    	{
    		return $skpd->kode_skpd;
    	}
    	elseif($mode == "nama_skpd")
    	{
    		return $skpd->nama_skpd;
    	}
    }
}