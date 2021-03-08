<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Json;
use yii\filters\VerbFilter;

class SipdController extends Controller
{
	public function actionSkpd()
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
}