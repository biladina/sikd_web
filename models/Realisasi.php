<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "realisasi".
 *
 * @property int $tahun
 * @property int $id_unit
 * @property int $id_skpd
 * @property string $kode_skpd
 * @property string $nama_skpd
 * @property int $id_urusan
 * @property string $kode_urusan
 * @property string $nama_urusan
 * @property int $id_bidang_urusan
 * @property string $kode_bidang_urusan
 * @property string $nama_bidang_urusan
 * @property int $id_sub_skpd
 * @property string $kode_sub_skpd
 * @property string $nama_sub_skpd
 * @property int $id_program
 * @property string $kode_program
 * @property string $nama_program
 * @property int $id_giat
 * @property string $kode_giat
 * @property string $nama_giat
 * @property int $id_sub_giat
 * @property string $kode_sub_giat
 * @property string $nama_sub_giat
 * @property int $id_akun
 * @property string $kode_akun
 * @property string $nama_akun
 * @property float $rincian
 * @property string $LEN
 * @property string $id_skpd_id_sub_skpd_id_sub_giat_id_akun
 * @property float $realisasi
 * @property string $kode_jenis
 * @property string $nama_jenis
 */
class Realisasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'realisasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun', 'id_unit', 'id_skpd', 'kode_skpd', 'nama_skpd', 'id_urusan', 'kode_urusan', 'nama_urusan', 'id_bidang_urusan', 'kode_bidang_urusan', 'nama_bidang_urusan', 'id_sub_skpd', 'kode_sub_skpd', 'nama_sub_skpd', 'id_program', 'kode_program', 'nama_program', 'id_giat', 'kode_giat', 'nama_giat', 'id_sub_giat', 'kode_sub_giat', 'nama_sub_giat', 'id_akun', 'kode_akun', 'nama_akun', 'rincian', 'LEN', 'id_skpd_id_sub_skpd_id_sub_giat_id_akun', 'realisasi', 'kode_jenis', 'nama_jenis'], 'required'],
            [['tahun', 'id_unit', 'id_skpd', 'id_urusan', 'id_bidang_urusan', 'id_sub_skpd', 'id_program', 'id_giat', 'id_sub_giat', 'id_akun'], 'integer'],
            [['kode_skpd', 'nama_skpd', 'kode_urusan', 'nama_urusan', 'kode_bidang_urusan', 'nama_bidang_urusan', 'kode_sub_skpd', 'nama_sub_skpd', 'kode_program', 'nama_program', 'kode_giat', 'nama_giat', 'kode_sub_giat', 'nama_sub_giat', 'kode_akun', 'nama_akun', 'LEN', 'id_skpd_id_sub_skpd_id_sub_giat_id_akun', 'kode_jenis', 'nama_jenis'], 'safe'],
            [['rincian', 'realisasi'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tahun' => 'Tahun',
            'id_unit' => 'Id Unit',
            'id_skpd' => 'Id Skpd',
            'kode_skpd' => 'Kode Skpd',
            'nama_skpd' => 'Nama Skpd',
            'id_urusan' => 'Id Urusan',
            'kode_urusan' => 'Kode Urusan',
            'nama_urusan' => 'Nama Urusan',
            'id_bidang_urusan' => 'Id Bidang Urusan',
            'kode_bidang_urusan' => 'Kode Bidang Urusan',
            'nama_bidang_urusan' => 'Nama Bidang Urusan',
            'id_sub_skpd' => 'Id Sub Skpd',
            'kode_sub_skpd' => 'Kode Sub Skpd',
            'nama_sub_skpd' => 'Nama Sub Skpd',
            'id_program' => 'Id Program',
            'kode_program' => 'Kode Program',
            'nama_program' => 'Nama Program',
            'id_giat' => 'Id Giat',
            'kode_giat' => 'Kode Giat',
            'nama_giat' => 'Nama Giat',
            'id_sub_giat' => 'Id Sub Giat',
            'kode_sub_giat' => 'Kode Sub Giat',
            'nama_sub_giat' => 'Nama Sub Giat',
            'id_akun' => 'Id Akun',
            'kode_akun' => 'Kode Akun',
            'nama_akun' => 'Nama Akun',
            'rincian' => 'Rincian',
            'LEN' => 'Len',
            'id_skpd_id_sub_skpd_id_sub_giat_id_akun' => 'Id Skpd Id Sub Skpd Id Sub Giat Id Akun',
            'realisasi' => 'Realisasi',
            'kode_jenis' => 'Kode Jenis',
            'nama_jenis' => 'Nama Jenis',
        ];
    }
}
