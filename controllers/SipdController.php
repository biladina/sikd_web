<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\helpers\Json;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

class SipdController extends \yii\rest\Controller
{
	public function actionGetSkpd()
	{
		$out = [];
		$model = \app\models\Skpd::find()->all();

		foreach($model as $model)
		{
			$out[] = [
				'id_unit' => $model->id_unit,
				'id_skpd' => $model->id_skpd,
				'kode_skpd' => $model->kode_skpd,
				'nama_skpd' => $model->nama_skpd
			];
		}

        return Json::encode($out);
	}

	public function actionGetSubKegiatanBelanja()
	{
		$model = \app\models\SubKegiatanBelanja::find()->asArray()->all();

        return $model;
	}

	public function actionSubKegiatanBelanja()
	{
		$this->enableCsrfValidation = false;
		$request = Yii::$app->request;

		$data = $request->post('data');
		$data = Json::decode($data);

		$transaction = \Yii::$app->db->beginTransaction();
        try
        {
        	$jlh_sub_kegiatan_belanja = 0;

        	foreach($data as $data)
			{
				if($data['rincian'] > 0)
				{
					$model = \app\models\SubKegiatanBelanja::findOne(['id_unit' => $data['id_unit'], 'id_skpd' => $data['id_skpd'], 'id_sub_skpd' => $data['id_sub_skpd'], 'id_program' => $data['id_program'], 'id_giat' => $data['id_giat'], 'id_sub_giat' => $data['id_sub_giat']]);

					if(!$model) { $model = new \app\models\SubKegiatanBelanja(); }

					$model->id_jadwal = $data['id_jadwal'];
	                $model->id_daerah = $data['id_daerah'];
	                $model->tahun = $data['tahun'];
	                $model->id_unit = $data['id_unit'];
	                $model->id_skpd = $data['id_skpd'];
	                $model->kode_skpd = $data['kode_skpd'];
	                $model->nama_skpd = $data['nama_skpd'];
	                $model->id_urusan = $data['id_urusan'];
	                $model->kode_urusan = $data['kode_urusan'];
	                $model->nama_urusan = $data['nama_urusan'];
	                $model->id_bidang_urusan = $data['id_bidang_urusan'];
	                $model->kode_bidang_urusan = $data['kode_bidang_urusan'];
	                $model->nama_bidang_urusan = $data['nama_bidang_urusan'];
	                $model->id_sub_skpd = $data['id_sub_skpd'];
	                $model->kode_sub_skpd = $data['kode_sub_skpd'];
	                $model->nama_sub_skpd = $data['nama_sub_skpd'];
	                $model->id_program = $data['id_program'];
	                $model->kode_program = $data['kode_program'];
	                $model->nama_program = $data['nama_program'];
	                $model->id_giat = $data['id_giat'];
	                $model->kode_giat = $data['kode_giat'];
	                
	                $model->kode_bl = $data['kode_bl'];
	                $model->nama_giat = $data['nama_giat'];
	                $model->thpPos_giat = $data['thpPos_giat'];
	                $model->gtLock = $data['gtLock'];
	                $model->pagu_giat = $data['pagu_giat'];
	                $model->rinci_giat = $data['rinci_giat'];
	                
	                $model->id_sub_giat = $data['id_sub_giat'];
	                $model->kode_sub_giat = $data['kode_sub_giat'];

	                $model->kode_sbl = $data['kode_sbl'];
	                $model->nama_sub_giat = $data['nama_sub_giat'];
	                $model->thpPos_sub_giat = $data['thpPos_sub_giat'];
	                $model->pagu = $data['pagu'];
	                $model->rincian = $data['rincian'];
	                $model->mst_lock = $data['mst_lock'];

	                $model->pagu_indikatif = $data['pagu_indikatif'];
	                $model->urusan_locked = $data['urusan_locked'];
	                $model->bidang_urusan_locked = $data['bidang_urusan_locked'];
	                $model->program_locked = $data['program_locked'];
	                $model->giat_locked = $data['giat_locked'];
	                $model->sub_giat_locked = $data['giat_locked'];
	                $model->kunci_bl = $data['kunci_bl'];
	                $model->kunci_bl_rinci = $data['kunci_bl_rinci'];
	                $model->user_created = $data['user_created'];
	                $model->created_date = $data['created_date'];
	                $model->created_time = $data['created_time'];
	                $model->user_updated = $data['user_updated'];
	                $model->updated_date = $data['updated_date'];
	                $model->updated_time = $data['updated_time'];
	                $model->set_zona = $data['set_zona'];
	                $model->usul_asmas = $data['usul_asmas'];
	                $model->usul_reses = $data['usul_reses'];
	                $model->status_giat = $data['status_giat'];
	                $model->status_rincian = $data['status_rincian'];
	                $model->batasanpagu = $data['batasanpagu'];
	                $model->pagumurni = $data['pagumurni'];
	                $model->realisasi = $data['realisasi'];
	                $model->stat_asmas = $data['stat_asmas'];
	                $model->stat_reses = $data['stat_reses'];

	                if($flag = ($model->save())) {}
		            else
		            {
		                $transaction->rollBack();
		                return $model->errors;
		            }
				}
				$jlh_sub_kegiatan_belanja++;
			}

            if($flag)
            {
                $transaction->commit();
                return $jlh_sub_kegiatan_belanja.' transaksi berhasil';
            }
        }
        catch(Exception $e)
        {
            $transaction->rollBack();
            return $e;
        }
	}
}