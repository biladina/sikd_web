<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\helpers\Json;
use yii\console\ExitCode;
use yii2tech\spreadsheet\Spreadsheet;
use yii\data\ActiveDataProvider;

class PendapatanController extends Controller
{
	public function actionSkpd()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/pendapatan/pendapatan.json'));
        $skpd = Json::decode($json);

        foreach($skpd as $skpd)
        {
        	$model = \app\models\Skpd::findOne(['id_unit' => $skpd['id_unit'], 'id_skpd' => $skpd['id_skpd']]);

        	if($model)
        	{
        		$model->nilai_total = $skpd['nilaitotal'];
	        	$model->nilai_murni = (string)$skpd['nilaimurni'];

	        	if($model->save())
	        	{
	        		echo "saved";
	        	}
	        	else
	        	{
	        		var_dump($model->errors);
	        		// echo "fail";
	        	}
        	}
        	else
        	{
        		echo "bad";
        	}
        }
    }

    public function actionPendapatan()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/pendapatan/pendapatan_skpkd.json'));
        $pendapatan = Json::decode($json);

        foreach($pendapatan as $pendapatan)
        {
        	$model = new \app\models\Pendapatan();

        	$model->id_pendapatan = $pendapatan['id_pendapatan'];
        	$model->kode_akun = $pendapatan['kode_akun'];
        	$model->nama_akun = $pendapatan['nama_akun'];
        	$model->uraian = $pendapatan['uraian'];
        	$model->keterangan = $pendapatan['keterangan'];
        	$model->skpd_koordinator = $pendapatan['skpd_koordinator'];
        	$model->urusan_koordinator = $pendapatan['urusan_koordinator'];
        	$model->program_koordinator = $pendapatan['program_koordinator'];
        	$model->total = $pendapatan['total'];
        	$model->created_user = $pendapatan['created_user'];
        	$model->createddate = $pendapatan['createddate'];
        	$model->createdtime = $pendapatan['createdtime'];
        	$model->updated_user = $pendapatan['updated_user'];
        	$model->updateddate = $pendapatan['updateddate'];
        	$model->updatedtime = $pendapatan['updatedtime'];
        	$model->rekening = $pendapatan['rekening'];
        	$model->user1 = $pendapatan['user1'];
        	$model->user2 = $pendapatan['user2'];
        	$model->nilaimurni = $pendapatan['nilaimurni'];

        	if($model->save())
        	{
        		echo "saved";
        	}
        	else
        	{
        		echo "fail";
        	}
        }
    }

    public function actionExcel()
    {
        $exporter = new Spreadsheet([
            'dataProvider' => new ActiveDataProvider([
                'query' => \app\models\Pendapatan::find()->orderBy(['skpd_koordinator' => SORT_ASC]),
            ]),
            'columns' => [
                [
                    'label' => 'kodeUrusanProgram',
                    'value' => function($model) { return (string)'0.00 '; }
                ],
                [
                    'label' => 'namaUrusanProgram',
                    'value' => function($model) { return 'Non Urusan'; }
                ],
                [
                    'label' => 'kodeUrusanPelaksana',
                    'value' => function($model) { return substr($this->skpd($model->skpd_koordinator, 'kode_skpd'), 0, 4).' '; }
                ],
                [
                    'label' => 'namaUrusanPelaksana',
                    'value' => function($model) {
                        return $this->urusan_bidang(substr($this->skpd($model->skpd_koordinator, 'kode_skpd'), 0, 4));
                    }
                ],
                [
                    'label' => 'kodeSKPD',
                    'value' => function($model) {
                        return $this->skpd($model->skpd_koordinator, 'kode_skpd');
                    }
                ],
                [
                    'label' => 'namaSKPD',
                    'value' => function($model) {
                        return $this->skpd($model->skpd_koordinator, 'nama_skpd');
                    }
                ],
                [
                    'label' => 'kodeProgram',
                    'value' => function($model) { return (string)'000'; }
                ],
                [
                    'label' => 'namaProgram',
                    'value' => function($model) { return 'Non Program'; }
                ],
                [
                    'label' => 'kodeKegiatan',
                    'value' => function($model) { return (string)'0.0000 '; }
                ],
                [
                    'label' => 'namaKegiatan',
                    'value' => function($model) { return 'Non Kegiatan'; }
                ],
                [
                    'label' => 'kodeFungsi',
                    'value' => function($model) { return (string)'0000'; }
                ],
                [
                    'label' => 'namaFungsi',
                    'value' => function($model) { return 'Non Fungsi|Non Sub Fungsi'; }
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
                	'attribute' => 'total',
                    'label' => 'nilaiAnggaran'
                ],
            ],
        ]);
        
        $exporter->save(Yii::getAlias('@app/commands/excel/pendapatan.xls'));
    }

    public function urusan_bidang($urusan_bidang)
    {
        $urusan_bidang = \app\models\UrusanBidang::find()->where(['kode_bidang_urusan' => $urusan_bidang])->one();

        return substr($urusan_bidang->nama_urusan, 2);;
    }

    public function akun($kode_akun)
    {
        $akun = \app\models\AkunBelanja::find()->where(['kode_akun' => $kode_akun])->one();

        return $akun->nama_akun;
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