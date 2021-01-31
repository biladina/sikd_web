<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "akun_belanja".
 *
 * @property int|null $id_akun
 * @property int|null $tahun
 * @property int|null $id_daerah
 * @property string|null $kode_akun
 * @property string|null $nama_akun
 * @property int|null $is_pendapatan
 * @property int|null $is_bl
 * @property int|null $is_pembiayaan
 * @property string|null $id_unik
 * @property int|null $is_locked
 * @property int|null $set_input
 * @property string|null $set_lokus
 * @property int|null $is_gaji_asn
 * @property int|null $is_barjas
 * @property int|null $is_bunga
 * @property int|null $is_subsidi
 * @property int|null $is_bagi_hasil
 * @property int|null $is_bankeu_umum
 * @property int|null $is_bankeu_khusus
 * @property int|null $is_btt
 * @property int|null $is_hibah_brg
 * @property int|null $is_hibah_uang
 * @property int|null $is_sosial_brg
 * @property int|null $is_sosial_uang
 * @property int|null $is_bos
 * @property int|null $is_modal_tanah
 * @property string|null $status
 * @property string|null $belanja
 */
class AkunBelanja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'akun_belanja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_akun', 'tahun', 'id_daerah', 'is_pendapatan', 'is_bl', 'is_pembiayaan', 'is_locked', 'set_input', 'is_gaji_asn', 'is_barjas', 'is_bunga', 'is_subsidi', 'is_bagi_hasil', 'is_bankeu_umum', 'is_bankeu_khusus', 'is_btt', 'is_hibah_brg', 'is_hibah_uang', 'is_sosial_brg', 'is_sosial_uang', 'is_bos', 'is_modal_tanah'], 'integer'],
            [['kode_akun', 'nama_akun', 'id_unik', 'set_lokus', 'status', 'belanja'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_akun' => 'Id Akun',
            'tahun' => 'Tahun',
            'id_daerah' => 'Id Daerah',
            'kode_akun' => 'Kode Akun',
            'nama_akun' => 'Nama Akun',
            'is_pendapatan' => 'Is Pendapatan',
            'is_bl' => 'Is Bl',
            'is_pembiayaan' => 'Is Pembiayaan',
            'id_unik' => 'Id Unik',
            'is_locked' => 'Is Locked',
            'set_input' => 'Set Input',
            'set_lokus' => 'Set Lokus',
            'is_gaji_asn' => 'Is Gaji Asn',
            'is_barjas' => 'Is Barjas',
            'is_bunga' => 'Is Bunga',
            'is_subsidi' => 'Is Subsidi',
            'is_bagi_hasil' => 'Is Bagi Hasil',
            'is_bankeu_umum' => 'Is Bankeu Umum',
            'is_bankeu_khusus' => 'Is Bankeu Khusus',
            'is_btt' => 'Is Btt',
            'is_hibah_brg' => 'Is Hibah Brg',
            'is_hibah_uang' => 'Is Hibah Uang',
            'is_sosial_brg' => 'Is Sosial Brg',
            'is_sosial_uang' => 'Is Sosial Uang',
            'is_bos' => 'Is Bos',
            'is_modal_tanah' => 'Is Modal Tanah',
            'status' => 'Status',
            'belanja' => 'Belanja',
        ];
    }
}
