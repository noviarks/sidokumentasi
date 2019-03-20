<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "albums".
 *
 * @property integer $id_album
 * @property string $kata_kunci
 * @property integer $object_id
 * @property string $tgl_post
 * @property string $nama_album
 * @property string $keterangan
 *
 * @property Objects $object
 * @property Fotos[] $fotos
 */
class Albums extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'albums';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['object_id','kategori_id','tgl_post', 'nama_album','user_id'], 'required'],
            [['object_id'], 'integer'],
            [['kategori_id'], 'integer'],
            [['tgl_post'], 'safe'],
            [['nama_album'], 'string', 'max' => 200],
            [['keterangan'], 'string', 'max' => 255],
            [['terbaru'], 'string', 'max' => 6],
            [['user_id'], 'integer'],
            [['download'], 'integer'],
            [['object_id'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::className(), 'targetAttribute' => ['object_id' => 'id_object']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' 
                => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_album' => 'Id Album',
            'object_id' => 'Nama Object',
            'kategori_id' => 'Kategori',
            'tgl_post' => 'Tgl Kegiatan',
            'nama_album' => 'Nama Album',
            'keterangan' => 'Keterangan',
            'user_id' => 'Pembuat Album',
            'terbaru' => 'Berisi Foto Terbaru untuk Tampilan Home',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObject()
    {
        return $this->hasOne(Objects::className(), ['id_object' => 'object_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id_kategori' => 'kategori_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFotos()
    {
        return $this->hasMany(Fotos::className(), ['album_id' => 'id_album']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
