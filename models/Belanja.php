<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "belanja".
 *
 * @property int|null $id_urusan
 * @property string|null $kode_urusan
 * @property string|null $nama_urusan
 * @property int|null $id_bidang_urusan
 * @property string|null $kode_bidang_urusan
 * @property string|null $nama_bidang_urusan
 * @property int|null $id_program
 * @property string|null $kode_program
 * @property string|null $nama_program
 * @property string|null $kode_skpd
 * @property string|null $nama_skpd
 * @property string|null $kode_sub_skpd
 * @property string|null $nama_sub_skpd
 * @property int|null $id_giat
 * @property string|null $kode_giat
 * @property string|null $nama_giat
 * @property int|null $id_sub_giat
 * @property string|null $kode_sub_giat
 * @property string|null $nama_sub_giat
 * @property string|null $kode_akun
 * @property string|null $nama_akun
 * @property string|null $rincian
 */
class Belanja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'belanja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_urusan', 'id_bidang_urusan', 'id_program', 'id_giat', 'id_sub_giat'], 'integer'],
            [['kode_urusan', 'nama_urusan', 'kode_bidang_urusan', 'nama_bidang_urusan', 'kode_program', 'nama_program', 'kode_skpd', 'nama_skpd', 'kode_sub_skpd', 'nama_sub_skpd', 'kode_giat', 'nama_giat', 'kode_sub_giat', 'nama_sub_giat', 'kode_akun', 'nama_akun', 'rincian'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_urusan' => 'Id Urusan',
            'kode_urusan' => 'Kode Urusan',
            'nama_urusan' => 'Nama Urusan',
            'id_bidang_urusan' => 'Id Bidang Urusan',
            'kode_bidang_urusan' => 'Kode Bidang Urusan',
            'nama_bidang_urusan' => 'Nama Bidang Urusan',
            'id_program' => 'Id Program',
            'kode_program' => 'Kode Program',
            'nama_program' => 'Nama Program',
            'kode_skpd' => 'Kode Skpd',
            'nama_skpd' => 'Nama Skpd',
            'kode_sub_skpd' => 'Kode Sub Skpd',
            'nama_sub_skpd' => 'Nama Sub Skpd',
            'id_giat' => 'Id Giat',
            'kode_giat' => 'Kode Giat',
            'nama_giat' => 'Nama Giat',
            'id_sub_giat' => 'Id Sub Giat',
            'kode_sub_giat' => 'Kode Sub Giat',
            'nama_sub_giat' => 'Nama Sub Giat',
            'kode_akun' => 'Kode Akun',
            'nama_akun' => 'Nama Akun',
            'rincian' => 'Rincian',
        ];
    }
}
