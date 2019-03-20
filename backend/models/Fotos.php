<?php

namespace backend\models;

use Yii;
use yii\db\Query;


/**
 * This is the model class for table "fotos".
 *
 * @property integer $id_foto
 * @property integer $album_id
 * @property string $foto
 *
 * @property Albums $album
 */
class Fotos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fotos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album_id'], 'required'],
            [['album_id'], 'integer'],
            [['nama'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 50],
            [['prioritas_home'], 'string', 'max' => 2],
            [['user_id'], 'integer'],
            [['foto'], 'file','extensions'=>'jpg,jpeg, gif, png', 'maxFiles'=> 10,'skipOnEmpty' => false],
            [['album_id'], 'exist', 'skipOnError' => true, 'targetClass' => Albums::className(), 'targetAttribute' => ['album_id' => 'id_album']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_foto' => 'Id Foto',
            'album_id' => 'Nama Album',
            'foto' => 'Foto',
            'nama' => 'Nama Foto',
            'user_id' => 'Diupload Oleh'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(Albums::className(), ['id_album' => 'album_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    public function getNext()
    {
        return Fotos::find()
             ->where(['<', 'id_foto', $this->id_foto])
             ->andWhere('album_id='.$this->album->id_album)
             ->orderBy(['id_foto' => SORT_DESC])
             ->one();
    }

    public function getPrev()
    {
        return Fotos::find()
             ->where(['>', 'id_foto', $this->id_foto])
             ->andWhere('album_id='.$this->album->id_album)
             ->orderBy(['id_foto' => SORT_ASC])
             ->one();
    }
}
