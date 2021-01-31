<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "urusan_bidang".
 *
 * @property int|null $id_bidang_urusan
 * @property int|null $tahun
 * @property int|null $id_daerah
 * @property int|null $id_urusan
 * @property int|null $id_fungsi
 * @property string|null $kode_urusan
 * @property string|null $nama_urusan
 * @property string|null $kode_bidang_urusan
 * @property string|null $nama_bidang_urusan
 * @property string|null $id_unik
 * @property int|null $is_locked
 * @property int|null $created_user
 * @property string|null $created_at
 * @property string|null $status
 */
class UrusanBidang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'urusan_bidang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bidang_urusan', 'tahun', 'id_daerah', 'id_urusan', 'id_fungsi', 'is_locked', 'created_user'], 'integer'],
            [['kode_urusan', 'nama_urusan', 'kode_bidang_urusan', 'nama_bidang_urusan', 'id_unik', 'created_at', 'status'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bidang_urusan' => 'Id Bidang Urusan',
            'tahun' => 'Tahun',
            'id_daerah' => 'Id Daerah',
            'id_urusan' => 'Id Urusan',
            'id_fungsi' => 'Id Fungsi',
            'kode_urusan' => 'Kode Urusan',
            'nama_urusan' => 'Nama Urusan',
            'kode_bidang_urusan' => 'Kode Bidang Urusan',
            'nama_bidang_urusan' => 'Nama Bidang Urusan',
            'id_unik' => 'Id Unik',
            'is_locked' => 'Is Locked',
            'created_user' => 'Created User',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }
}
