<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\helpers\Json;
use yii\console\ExitCode;
use yii2tech\spreadsheet\Spreadsheet;
use yii\data\ActiveDataProvider;

class RealisasiController extends Controller
{
	public function actionExcelBelumRealisasi()
    {
        $exporter = new Spreadsheet([
            'dataProvider' => new ActiveDataProvider([
                'query' => \app\models\Realisasi::find()->andWhere('realisasi = 0'),
            ]),
            'columns' => [
            	[
            		'label' => 'periode',
            		'value' => function($model) { return "0"; }
            	],
                [
                    'attribute' => 'kode_bidang_urusan',
                    'label' => 'kodeUrusanProgram'
                ],
                [
                    'attribute' => 'nama_bidang_urusan',
                    'label' => 'namaUrusanProgram',
                ],
                [
                    'label' => 'kodeUrusanPelaksana',
                    'value' => function($model) {
                        $kode_urusan = substr($model->kode_skpd, 0, 1);
                        $kode_bidang = substr($model->kode_skpd, 2, 2);
                        return $kode_urusan.".".$kode_bidang;
                    }
                ],
                [
                    'label' => 'namaUrusanPelaksana',
                    'value' => function($model) {
                    	$kode_urusan = substr($model->kode_skpd, 0, 1);
                        $kode_bidang = substr($model->kode_skpd, 2, 2);
                    	return $this->urusan_bidang($kode_urusan.".".$kode_bidang);
                    },
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
                    'value' => function($model) {return '0'.substr($model->kode_program, 5);}
                ],
                [
                    'attribute' => 'nama_program',
                    'label' => 'namaProgram',
                ],
                [
                    'attribute' => 'kode_sub_giat',
                    'label' => 'kodeKegiatan',
                    'value' => function($model) {return '0'.str_replace(".","", substr($model->kode_sub_giat, 8));}
                ],
                [
                    'attribute' => 'nama_giat',
                    'label' => 'namaKegiatan',
                    'value' => function($model) { return $model->nama_giat.'|'.$model->nama_sub_giat; }
                ],
                [
                    'label' => 'kodeFungsi',
                    'value' => function($model) {
                        $kode_urusan = substr($model->kode_skpd, 0, 1);
                        $kode_bidang = substr($model->kode_skpd, 2, 2);
                        return $this->kode_fungsi($kode_urusan, $kode_bidang);
                    }
                ],
                [
                    'label' => 'namaFungsi',
                    'value' => function($model) {
                        $kode_urusan = substr($model->kode_skpd, 0, 1);
                        $kode_bidang = substr($model->kode_skpd, 2, 2);
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
                ],
                [
                    'attribute' => 'realisasi',
                    'label' => 'nilaiRealisasi'
                ],
            ],
        ]);
        
        $exporter->save(Yii::getAlias('@app/commands/excel/belum_realisasi.xls'));
    }

    public function actionExcelSudahRealisasi()
    {
        $exporter = new Spreadsheet([
            'dataProvider' => new ActiveDataProvider([
                'query' => \app\models\RealisasiDetail::find()->orderBy(['tgl_dokumen' => SORT_ASC]),
            ]),
            'columns' => [
            	[
            		'label' => 'periode',
            		'value' => function($model) {
            			$bulan = date("m", strtotime($model->tgl_dokumen));
            			return (int)$bulan;
            		}
            	],
                [
                    'attribute' => 'kode_bidang_urusan',
                    'label' => 'kodeUrusanProgram'
                ],
                [
                    'attribute' => 'nama_bidang_urusan',
                    'label' => 'namaUrusanProgram',
                ],
                [
                    'label' => 'kodeUrusanPelaksana',
                    'value' => function($model) {
                        $kode_urusan = substr($model->kode_skpd, 0, 1);
                        $kode_bidang = substr($model->kode_skpd, 2, 2);
                        return $kode_urusan.".".$kode_bidang;
                    }
                ],
                [
                    'label' => 'namaUrusanPelaksana',
                    'value' => function($model) {
                    	$kode_urusan = substr($model->kode_skpd, 0, 1);
                        $kode_bidang = substr($model->kode_skpd, 2, 2);
                    	return $this->urusan_bidang($kode_urusan.".".$kode_bidang);
                    },
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
                    'value' => function($model) {return '0'.substr($model->kode_program, 5);}
                ],
                [
                    'attribute' => 'nama_program',
                    'label' => 'namaProgram',
                ],
                [
                    'attribute' => 'kode_sub_giat',
                    'label' => 'kodeKegiatan',
                    'value' => function($model) {return '0'.str_replace(".","", substr($model->kode_sub_giat, 8));}
                ],
                [
                    'attribute' => 'nama_giat',
                    'label' => 'namaKegiatan',
                    'value' => function($model) { return $model->nama_giat.'|'.$model->nama_sub_giat; }
                ],
                [
                    'label' => 'kodeFungsi',
                    'value' => function($model) {
                        $kode_urusan = substr($model->kode_skpd, 0, 1);
                        $kode_bidang = substr($model->kode_skpd, 2, 2);
                        return $this->kode_fungsi($kode_urusan, $kode_bidang);
                    }
                ],
                [
                    'label' => 'namaFungsi',
                    'value' => function($model) {
                        $kode_urusan = substr($model->kode_skpd, 0, 1);
                        $kode_bidang = substr($model->kode_skpd, 2, 2);
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
                ],
                [
                    'attribute' => 'realisasi',
                    'label' => 'nilaiRealisasi'
                ],
            ],
        ]);
        
        $exporter->save(Yii::getAlias('@app/commands/excel/sudah_realisasi.xls'));
    }

    public function actionExcelRealisasiPendapatan()
    {
        $exporter = new Spreadsheet([
            'dataProvider' => new ActiveDataProvider([
                'query' => \app\models\RealisasiPendapatan::find()->orderBy(['periode' => SORT_ASC]),
            ]),
            'columns' => [
                [
                    'attribute' => 'periode',
                    'label' => 'periode',
                ],
                [
                    'attribute' => 'kode_bidang_urusan',
                    'label' => 'kodeUrusanProgram'
                ],
                [
                    'attribute' => 'nama_bidang_urusan',
                    'label' => 'namaUrusanProgram',
                ],
                [
                    'label' => 'kodeUrusanPelaksana',
                    'value' => function($model) {
                        $kode_urusan = substr($model->kode_skpd, 0, 1);
                        $kode_bidang = substr($model->kode_skpd, 2, 2);
                        return $kode_urusan.".".$kode_bidang;
                    }
                ],
                [
                    'label' => 'namaUrusanPelaksana',
                    'value' => function($model) {
                        $kode_urusan = substr($model->kode_skpd, 0, 1);
                        $kode_bidang = substr($model->kode_skpd, 2, 2);
                        return $this->urusan_bidang($kode_urusan.".".$kode_bidang);
                    },
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
                    'value' => function($model) {return '0'.substr($model->kode_program, 5);}
                ],
                [
                    'attribute' => 'nama_program',
                    'label' => 'namaProgram',
                ],
                [
                    'attribute' => 'kode_sub_giat',
                    'label' => 'kodeKegiatan',
                    'value' => function($model) {return '0'.str_replace(".","", substr($model->kode_sub_giat, 8));}
                ],
                [
                    'attribute' => 'nama_giat',
                    'label' => 'namaKegiatan',
                    'value' => function($model) { return $model->nama_giat.'|'.$model->nama_sub_giat; }
                ],
                [
                    'label' => 'kodeFungsi',
                    'value' => function($model) {
                        $kode_urusan = substr($model->kode_skpd, 0, 1);
                        $kode_bidang = substr($model->kode_skpd, 2, 2);
                        return $this->kode_fungsi($kode_urusan, $kode_bidang);
                    }
                ],
                [
                    'label' => 'namaFungsi',
                    'value' => function($model) {
                        $kode_urusan = substr($model->kode_skpd, 0, 1);
                        $kode_bidang = substr($model->kode_skpd, 2, 2);
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
                ],
                [
                    'attribute' => 'nilai',
                    'label' => 'nilaiRealisasi'
                ],
            ],
        ]);
        
        $exporter->save(Yii::getAlias('@app/commands/excel/realisasi_pendapatan.xls'));
    }

    private function akun($kode_akun)
    {
        $akun = \app\models\AkunBelanja::find()->where(['kode_akun' => $kode_akun])->one();

        return $akun->nama_akun;
    }

    private function kode_fungsi($kode_urusan, $kode_bidang)
    {
        $fungsi = \app\models\Fungsi::find()->where(['kode_urusan' => $kode_urusan, 'kode_bidang' => $kode_bidang])->one();

        if($fungsi)
        {
			return (string)$fungsi->kode_fungsi.''.$fungsi->kode_sub_fungsi;
        }
        else
        {
        	return "";
        }
    }

    private function fungsi($kode_urusan, $kode_bidang)
    {
        $fungsi = \app\models\Fungsi::find()->where(['kode_urusan' => $kode_urusan, 'kode_bidang' => $kode_bidang])->one();

        if($fungsi)
        {
        	return $fungsi->fungsi.'|'.$fungsi->sub_fungsi;
        }
        else
        {
        	return "";
        }
    }

    private function urusan_bidang($kode_bidang_urusan)
    {
    	$model = \app\models\UrusanBidang::findOne(['kode_bidang_urusan' => $kode_bidang_urusan]);

    	if($model)
    	{
    		$urusan_bidang = substr($model->nama_bidang_urusan, 4);

    		return $urusan_bidang;
    	}
    	else
    	{
    		return "";
    	}
    }
}