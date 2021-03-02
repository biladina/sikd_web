<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendapatan".
 *
 * @property int $id_pendapatan
 * @property string|null $kode_akun
 * @property string|null $nama_akun
 * @property string|null $uraian
 * @property string|null $keterangan
 * @property int|null $skpd_koordinator
 * @property int|null $urusan_koordinator
 * @property int|null $program_koordinator
 * @property string|null $total
 * @property int|null $created_user
 * @property string|null $createddate
 * @property string|null $createdtime
 * @property int|null $updated_user
 * @property string|null $updateddate
 * @property string|null $updatedtime
 * @property string|null $rekening
 * @property string|null $user1
 * @property string|null $user2
 * @property int|null $nilaimurni
 */
class Pendapatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendapatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pendapatan'], 'required'],
            [['id_pendapatan', 'skpd_koordinator', 'urusan_koordinator', 'program_koordinator', 'created_user', 'updated_user', 'nilaimurni'], 'integer'],
            [['kode_akun', 'nama_akun', 'uraian', 'keterangan', 'total', 'createddate', 'createdtime', 'updateddate', 'updatedtime', 'rekening', 'user1', 'user2'], 'string'],
            [['id_pendapatan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pendapatan' => 'Id Pendapatan',
            'kode_akun' => 'Kode Akun',
            'nama_akun' => 'Nama Akun',
            'uraian' => 'Uraian',
            'keterangan' => 'Keterangan',
            'skpd_koordinator' => 'Skpd Koordinator',
            'urusan_koordinator' => 'Urusan Koordinator',
            'program_koordinator' => 'Program Koordinator',
            'total' => 'Total',
            'created_user' => 'Created User',
            'createddate' => 'Createddate',
            'createdtime' => 'Createdtime',
            'updated_user' => 'Updated User',
            'updateddate' => 'Updateddate',
            'updatedtime' => 'Updatedtime',
            'rekening' => 'Rekening',
            'user1' => 'User1',
            'user2' => 'User2',
            'nilaimurni' => 'Nilaimurni',
        ];
    }
}
