<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_kegiatan_belanja_paket".
 *
 * @property int $id_jadwal
 * @property int $id_daerah
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
 * @property string $pagu
 * @property int $id_akun
 * @property string $kode_akun
 * @property string $nama_akun
 * @property string|null $lokus_akun_teks
 * @property string $jenis_bl
 * @property int|null $is_paket
 * @property string $subs_bl_teks
 * @property string $ket_bl_teks
 * @property int $id_standar_harga
 * @property string|null $kode_standar_harga
 * @property string $nama_komponen
 * @property string|null $spek_komponen
 * @property string|null $satuan
 * @property string $rincian
 * @property float $pajak
 * @property string $volume
 * @property string $harga_satuan
 * @property string|null $koefisien
 * @property string|null $vol_1
 * @property string|null $sat_1
 * @property string|null $vol_2
 * @property string|null $sat_2
 * @property string|null $vol_3
 * @property string|null $sat_3
 * @property string|null $vol_4
 * @property string|null $sat_4
 * @property int $id_rinci_sub_bl
 * @property int $kunci_bl_rinci
 * @property int $urusan_locked
 * @property int $bidang_urusan_locked
 * @property int $program_locked
 * @property int $giat_locked
 * @property int $sub_giat_locked
 * @property int $akun_locked
 * @property string|null $user_created
 * @property string|null $created_date
 * @property string|null $created_time
 * @property string|null $user_updated
 * @property string|null $updated_date
 * @property string|null $updated_time
 * @property string $set_zona
 * @property float $totalpajak
 * @property float $pajakmurni
 */
class SubKegiatanBelanjaPaket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_kegiatan_belanja_paket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jadwal', 'id_daerah', 'tahun', 'id_unit', 'id_skpd', 'kode_skpd', 'nama_skpd', 'id_urusan', 'kode_urusan', 'nama_urusan', 'id_bidang_urusan', 'kode_bidang_urusan', 'nama_bidang_urusan', 'id_sub_skpd', 'kode_sub_skpd', 'nama_sub_skpd', 'id_program', 'kode_program', 'nama_program', 'id_giat', 'kode_giat', 'nama_giat', 'id_sub_giat', 'kode_sub_giat', 'nama_sub_giat', 'pagu', 'id_akun', 'kode_akun', 'nama_akun', 'jenis_bl', 'subs_bl_teks', 'ket_bl_teks', 'id_standar_harga', 'nama_komponen', 'rincian', 'pajak', 'volume', 'harga_satuan', 'id_rinci_sub_bl', 'kunci_bl_rinci', 'urusan_locked', 'bidang_urusan_locked', 'program_locked', 'giat_locked', 'sub_giat_locked', 'akun_locked', 'set_zona', 'totalpajak', 'pajakmurni'], 'required'],
            [['id_jadwal', 'id_daerah', 'tahun', 'id_unit', 'id_skpd', 'id_urusan', 'id_bidang_urusan', 'id_sub_skpd', 'id_program', 'id_giat', 'id_sub_giat', 'id_akun', 'is_paket', 'id_standar_harga', 'id_rinci_sub_bl', 'kunci_bl_rinci', 'urusan_locked', 'bidang_urusan_locked', 'program_locked', 'giat_locked', 'sub_giat_locked', 'akun_locked'], 'integer'],
            [['kode_skpd', 'nama_skpd', 'kode_urusan', 'nama_urusan', 'kode_bidang_urusan', 'nama_bidang_urusan', 'kode_sub_skpd', 'nama_sub_skpd', 'kode_program', 'nama_program', 'kode_giat', 'nama_giat', 'kode_sub_giat', 'nama_sub_giat', 'pagu', 'kode_akun', 'nama_akun', 'lokus_akun_teks', 'jenis_bl', 'subs_bl_teks', 'ket_bl_teks', 'kode_standar_harga', 'nama_komponen', 'spek_komponen', 'satuan', 'rincian', 'volume', 'harga_satuan', 'koefisien', 'vol_1', 'sat_1', 'vol_2', 'sat_2', 'vol_3', 'sat_3', 'vol_4', 'sat_4', 'user_created', 'created_date', 'created_time', 'user_updated', 'updated_date', 'updated_time', 'set_zona'], 'string'],
            [['pajak', 'totalpajak', 'pajakmurni'], 'number'],
            [['id_unit', 'id_skpd', 'id_sub_skpd', 'id_program', 'id_giat', 'id_sub_giat', 'id_akun', 'id_standar_harga'], 'unique', 'targetAttribute' => ['id_unit', 'id_skpd', 'id_sub_skpd', 'id_program', 'id_giat', 'id_sub_giat', 'id_akun', 'id_standar_harga']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jadwal' => 'Id Jadwal',
            'id_daerah' => 'Id Daerah',
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
            'pagu' => 'Pagu',
            'id_akun' => 'Id Akun',
            'kode_akun' => 'Kode Akun',
            'nama_akun' => 'Nama Akun',
            'lokus_akun_teks' => 'Lokus Akun Teks',
            'jenis_bl' => 'Jenis Bl',
            'is_paket' => 'Is Paket',
            'subs_bl_teks' => 'Subs Bl Teks',
            'ket_bl_teks' => 'Ket Bl Teks',
            'id_standar_harga' => 'Id Standar Harga',
            'kode_standar_harga' => 'Kode Standar Harga',
            'nama_komponen' => 'Nama Komponen',
            'spek_komponen' => 'Spek Komponen',
            'satuan' => 'Satuan',
            'rincian' => 'Rincian',
            'pajak' => 'Pajak',
            'volume' => 'Volume',
            'harga_satuan' => 'Harga Satuan',
            'koefisien' => 'Koefisien',
            'vol_1' => 'Vol 1',
            'sat_1' => 'Sat 1',
            'vol_2' => 'Vol 2',
            'sat_2' => 'Sat 2',
            'vol_3' => 'Vol 3',
            'sat_3' => 'Sat 3',
            'vol_4' => 'Vol 4',
            'sat_4' => 'Sat 4',
            'id_rinci_sub_bl' => 'Id Rinci Sub Bl',
            'kunci_bl_rinci' => 'Kunci Bl Rinci',
            'urusan_locked' => 'Urusan Locked',
            'bidang_urusan_locked' => 'Bidang Urusan Locked',
            'program_locked' => 'Program Locked',
            'giat_locked' => 'Giat Locked',
            'sub_giat_locked' => 'Sub Giat Locked',
            'akun_locked' => 'Akun Locked',
            'user_created' => 'User Created',
            'created_date' => 'Created Date',
            'created_time' => 'Created Time',
            'user_updated' => 'User Updated',
            'updated_date' => 'Updated Date',
            'updated_time' => 'Updated Time',
            'set_zona' => 'Set Zona',
            'totalpajak' => 'Totalpajak',
            'pajakmurni' => 'Pajakmurni',
        ];
    }
}
