<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fungsi".
 *
 * @property string|null $kode_fungsi
 * @property string|null $kode_sub_fungsi
 * @property string|null $kode_urusan
 * @property string|null $kode_bidang
 * @property string|null $sub_fungsi
 * @property string|null $fungsi
 */
class Fungsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fungsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_fungsi', 'kode_sub_fungsi', 'kode_urusan', 'kode_bidang', 'sub_fungsi', 'fungsi'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_fungsi' => 'Kode Fungsi',
            'kode_sub_fungsi' => 'Kode Sub Fungsi',
            'kode_urusan' => 'Kode Urusan',
            'kode_bidang' => 'Kode Bidang',
            'sub_fungsi' => 'Sub Fungsi',
            'fungsi' => 'Fungsi',
        ];
    }
}
