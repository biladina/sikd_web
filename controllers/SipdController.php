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
		$out = [];
		$model = \app\models\SubKegiatanBelanja::find()->all();

		foreach($model as $model)
		{
			$out[] = [
				'id_unit' => $model->id_unit,
				'id_skpd' => $model->id_skpd,
				'kode_bl' => $model->kode_bl,
				'kode_sbl' => $model->kode_sbl
			];
		}

        return $out;
	}

	public function actionSubKegiatanBelanja()
	{
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
					// $model = \app\models\SubKegiatanBelanja::findOne(['id_unit' => $data['id_unit'], 'id_skpd' => $data['id_skpd'], 'id_sub_skpd' => $data['id_sub_skpd'], 'id_program' => $data['id_program'], 'id_giat' => $data['id_giat'], 'id_sub_giat' => $data['id_sub_giat']]);
					// if(!$model) { $model = new \app\models\SubKegiatanBelanja(); }

					$model = new \app\models\SubKegiatanBelanja();

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

	public function actionSubKegiatanBelanjaPaket()
	{
		$request = Yii::$app->request;

		$data = $request->post('data');
		$data = Json::decode($data);

		$transaction = \Yii::$app->db->beginTransaction();
        try
        {
        	$jlh_sub_kegiatan_belanja_paket = 0;

        	foreach($data as $data)
			{
				// $model = \app\models\SubKegiatanBelanjaPaket::findOne(['id_unit' => $data['id_unit'], 'id_skpd' => $data['id_skpd'], 'id_sub_skpd' => $data['id_sub_skpd'], 'id_program' => $data['id_program'], 'id_giat' => $data['id_giat'], 'id_sub_giat' => $data['id_sub_giat'], 'id_akun' => $data['id_akun'], 'id_standar_harga' => $data['id_standar_harga'] ]);
				// if(!$model) { $model = new \app\models\SubKegiatanBelanjaPaket(); }

				$model = new \app\models\SubKegiatanBelanjaPaket();

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
                $model->nama_giat = $data['nama_giat'];
                $model->id_sub_giat = $data['id_sub_giat'];
                $model->kode_sub_giat = $data['kode_sub_giat'];
                $model->nama_sub_giat = $data['nama_sub_giat'];
                $model->pagu = $data['pagu'];
                $model->id_akun = $data['id_akun'];
				$model->kode_akun = $data['kode_akun'];
				$model->nama_akun = $data['nama_akun'];
				$model->lokus_akun_teks = $data['lokus_akun_teks'];
				$model->jenis_bl = $data['jenis_bl'];
				$model->is_paket = $data['is_paket'];
				$model->subs_bl_teks = $data['subs_bl_teks'];
				$model->ket_bl_teks = $data['ket_bl_teks'];
				$model->id_standar_harga = $data['id_standar_harga'];
				$model->kode_standar_harga = $data['kode_standar_harga'];

				$model->nama_komponen = $data['nama_komponen'];
				$model->spek_komponen = $data['spek_komponen'];
				
				$model->satuan = $data['satuan'];
				$model->rincian = $data['rincian'];
				$model->pajak = $data['pajak'];
				$model->volume = $data['volume'];
				$model->harga_satuan = $data['harga_satuan'];
				$model->koefisien = $data['koefisien'];
				$model->vol_1 = $data['vol_1'];
				$model->sat_1 = $data['sat_1'];
				$model->vol_2 = $data['vol_2'];
				$model->sat_2 = $data['sat_2'];
				$model->vol_3 = $data['vol_3'];
				$model->sat_3 = $data['sat_3'];
				$model->vol_4 = $data['vol_4'];
				$model->sat_4 = $data['sat_4'];
				$model->id_rinci_sub_bl = $data['id_rinci_sub_bl'];
                $model->kunci_bl_rinci = $data['kunci_bl_rinci'];
                $model->urusan_locked = $data['urusan_locked'];
                $model->bidang_urusan_locked = $data['bidang_urusan_locked'];
                $model->program_locked = $data['program_locked'];
                $model->giat_locked = $data['giat_locked'];
                $model->sub_giat_locked = $data['giat_locked'];
                $model->akun_locked = $data['akun_locked'];
                $model->user_created = $data['user_created'];
                $model->created_date = $data['created_date'];
                $model->created_time = $data['created_time'];
                $model->user_updated = $data['user_updated'];
                $model->updated_date = $data['updated_date'];
                $model->updated_time = $data['updated_time'];
                $model->set_zona = $data['set_zona'];
                $model->totalpajak = $data['totalpajak'];
                $model->pajakmurni = $data['pajakmurni'];

                if($flag = ($model->save())) {}
	            else
	            {
	                $transaction->rollBack();
	                return $model->errors;
	            }

				$jlh_sub_kegiatan_belanja_paket++;
			}

            if($flag)
            {
                $transaction->commit();
                return $jlh_sub_kegiatan_belanja_paket.' transaksi berhasil';
            }
        }
        catch(Exception $e)
        {
            $transaction->rollBack();
            return $e;
        }
	}
}