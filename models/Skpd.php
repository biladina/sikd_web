<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skpd".
 *
 * @property int|null $id_unit
 * @property int|null $id_skpd
 * @property string|null $kode_skpd
 * @property string|null $nama_skpd
 * @property int|null $kunci_skpd
 * @property int|null $id_setup_unit
 * @property int|null $is_skpd
 * @property string|null $posisi
 * @property string|null $status
 */
class Skpd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'skpd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_unit', 'id_skpd', 'kunci_skpd', 'id_setup_unit', 'is_skpd'], 'integer'],
            [['kode_skpd', 'nama_skpd', 'posisi', 'status'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_unit' => 'Id Unit',
            'id_skpd' => 'Id Skpd',
            'kode_skpd' => 'Kode Skpd',
            'nama_skpd' => 'Nama Skpd',
            'kunci_skpd' => 'Kunci Skpd',
            'id_setup_unit' => 'Id Setup Unit',
            'is_skpd' => 'Is Skpd',
            'posisi' => 'Posisi',
            'status' => 'Status',
        ];
    }
}
