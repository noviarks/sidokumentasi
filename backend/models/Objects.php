<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "objects".
 *
 * @property integer $id_object
 * @property string $nama_object
 *
 * @property Albums[] $albums
 */
class Objects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'objects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_object'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_object' => 'Id Object',
            'nama_object' => 'Nama Object',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Albums::className(), ['object_id' => 'id_object']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwal()
    {
        return $this->hasMany(Jadwal::className(), ['object_id' => 'id_object']);
    }
}
