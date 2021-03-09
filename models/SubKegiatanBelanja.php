<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_kegiatan_belanja".
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
 * @property string $kode_bl
 * @property string $nama_giat
 * @property int $thpPos_giat
 * @property int $gtLock
 * @property string $pagu_giat
 * @property string $rinci_giat
 * @property int $id_sub_giat
 * @property string $kode_sub_giat
 * @property string $kode_sbl
 * @property string $nama_sub_giat
 * @property int $thpPos_sub_giat
 * @property string $pagu
 * @property string $rincian
 * @property int $mst_lock
 * @property string $pagu_indikatif
 * @property int $urusan_locked
 * @property int $bidang_urusan_locked
 * @property int $program_locked
 * @property int $giat_locked
 * @property int $sub_giat_locked
 * @property string $kunci_bl
 * @property string $kunci_bl_rinci
 * @property string|null $user_created
 * @property string|null $created_date
 * @property string|null $created_time
 * @property string|null $user_updated
 * @property string|null $updated_date
 * @property string|null $updated_time
 * @property string $set_zona
 * @property int $usul_asmas
 * @property int $usul_reses
 * @property string $status_giat
 * @property string $status_rincian
 * @property int $batasanpagu
 * @property int $pagumurni
 * @property int $realisasi
 * @property int $stat_asmas
 * @property int $stat_reses
 */
class SubKegiatanBelanja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_kegiatan_belanja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jadwal', 'id_daerah', 'tahun', 'id_unit', 'id_skpd', 'kode_skpd', 'nama_skpd', 'id_urusan', 'kode_urusan', 'nama_urusan', 'id_bidang_urusan', 'kode_bidang_urusan', 'nama_bidang_urusan', 'id_sub_skpd', 'kode_sub_skpd', 'nama_sub_skpd', 'id_program', 'kode_program', 'nama_program', 'id_giat', 'kode_giat', 'kode_bl', 'nama_giat', 'thpPos_giat', 'gtLock', 'pagu_giat', 'rinci_giat', 'id_sub_giat', 'kode_sub_giat', 'kode_sbl', 'nama_sub_giat', 'thpPos_sub_giat', 'pagu', 'rincian', 'mst_lock', 'pagu_indikatif', 'urusan_locked', 'bidang_urusan_locked', 'program_locked', 'giat_locked', 'sub_giat_locked', 'kunci_bl', 'kunci_bl_rinci', 'set_zona', 'usul_asmas', 'usul_reses', 'status_giat', 'status_rincian', 'batasanpagu', 'pagumurni', 'realisasi', 'stat_asmas', 'stat_reses'], 'required'],
            [['id_jadwal', 'id_daerah', 'tahun', 'id_unit', 'id_skpd', 'id_urusan', 'id_bidang_urusan', 'id_sub_skpd', 'id_program', 'id_giat', 'thpPos_giat', 'gtLock', 'id_sub_giat', 'thpPos_sub_giat', 'mst_lock', 'urusan_locked', 'bidang_urusan_locked', 'program_locked', 'giat_locked', 'sub_giat_locked', 'usul_asmas', 'usul_reses', 'batasanpagu', 'pagumurni', 'realisasi', 'stat_asmas', 'stat_reses'], 'integer'],
            [['kode_skpd', 'nama_skpd', 'kode_urusan', 'nama_urusan', 'kode_bidang_urusan', 'nama_bidang_urusan', 'kode_sub_skpd', 'nama_sub_skpd', 'kode_program', 'nama_program', 'kode_giat', 'kode_bl', 'nama_giat', 'pagu_giat', 'rinci_giat', 'kode_sub_giat', 'kode_sbl', 'nama_sub_giat', 'pagu', 'rincian', 'pagu_indikatif', 'kunci_bl', 'kunci_bl_rinci', 'user_created', 'created_date', 'created_time', 'user_updated', 'updated_date', 'updated_time', 'set_zona', 'status_giat', 'status_rincian'], 'string'],
            [['id_unit', 'id_skpd', 'id_sub_skpd', 'id_program', 'id_giat', 'id_sub_giat'], 'unique', 'targetAttribute' => ['id_unit', 'id_skpd', 'id_sub_skpd', 'id_program', 'id_giat', 'id_sub_giat']],
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
            'kode_bl' => 'Kode Bl',
            'nama_giat' => 'Nama Giat',
            'thpPos_giat' => 'Thp Pos Giat',
            'gtLock' => 'Gt Lock',
            'pagu_giat' => 'Pagu Giat',
            'rinci_giat' => 'Rinci Giat',
            'id_sub_giat' => 'Id Sub Giat',
            'kode_sub_giat' => 'Kode Sub Giat',
            'kode_sbl' => 'Kode Sbl',
            'nama_sub_giat' => 'Nama Sub Giat',
            'thpPos_sub_giat' => 'Thp Pos Sub Giat',
            'pagu' => 'Pagu',
            'rincian' => 'Rincian',
            'mst_lock' => 'Mst Lock',
            'pagu_indikatif' => 'Pagu Indikatif',
            'urusan_locked' => 'Urusan Locked',
            'bidang_urusan_locked' => 'Bidang Urusan Locked',
            'program_locked' => 'Program Locked',
            'giat_locked' => 'Giat Locked',
            'sub_giat_locked' => 'Sub Giat Locked',
            'kunci_bl' => 'Kunci Bl',
            'kunci_bl_rinci' => 'Kunci Bl Rinci',
            'user_created' => 'User Created',
            'created_date' => 'Created Date',
            'created_time' => 'Created Time',
            'user_updated' => 'User Updated',
            'updated_date' => 'Updated Date',
            'updated_time' => 'Updated Time',
            'set_zona' => 'Set Zona',
            'usul_asmas' => 'Usul Asmas',
            'usul_reses' => 'Usul Reses',
            'status_giat' => 'Status Giat',
            'status_rincian' => 'Status Rincian',
            'batasanpagu' => 'Batasanpagu',
            'pagumurni' => 'Pagumurni',
            'realisasi' => 'Realisasi',
            'stat_asmas' => 'Stat Asmas',
            'stat_reses' => 'Stat Reses',
        ];
    }
}
