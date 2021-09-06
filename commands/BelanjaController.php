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
}