<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "realisasi_pendapatan".
 *
 * @property int $tahun
 * @property int $periode
 * @property int $id_unit
 * @property int $id_skpd
 * @property string $kode_skpd
 * @property string $nama_skpd
 * @property int $id_bidang_urusan
 * @property string $kode_bidang_urusan
 * @property string $nama_bidang_urusan
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
 * @property float $sampai_hari_ini
 * @property float $nilai
 */
class RealisasiPendapatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'realisasi_pendapatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun', 'periode', 'id_unit', 'id_skpd', 'kode_skpd', 'nama_skpd', 'id_bidang_urusan', 'kode_bidang_urusan', 'nama_bidang_urusan', 'id_program', 'kode_program', 'nama_program', 'id_giat', 'kode_giat', 'nama_giat', 'id_sub_giat', 'kode_sub_giat', 'nama_sub_giat', 'id_akun', 'kode_akun', 'nama_akun', 'sampai_hari_ini', 'nilai'], 'required'],
            [['tahun', 'periode', 'id_unit', 'id_skpd', 'id_bidang_urusan', 'id_program', 'id_giat', 'id_sub_giat', 'id_akun'], 'integer'],
            [['kode_skpd', 'nama_skpd', 'kode_bidang_urusan', 'nama_bidang_urusan', 'kode_program', 'nama_program', 'kode_giat', 'nama_giat', 'kode_sub_giat', 'nama_sub_giat', 'kode_akun', 'nama_akun'], 'safe'],
            [['sampai_hari_ini', 'nilai'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tahun' => 'Tahun',
            'periode' => 'Periode',
            'id_unit' => 'Id Unit',
            'id_skpd' => 'Id Skpd',
            'kode_skpd' => 'Kode Skpd',
            'nama_skpd' => 'Nama Skpd',
            'id_bidang_urusan' => 'Id Bidang Urusan',
            'kode_bidang_urusan' => 'Kode Bidang Urusan',
            'nama_bidang_urusan' => 'Nama Bidang Urusan',
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
            'sampai_hari_ini' => 'Sampai Hari Ini',
            'nilai' => 'Nilai',
        ];
    }
}
