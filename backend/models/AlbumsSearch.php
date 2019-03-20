<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Albums;

/**
 * AlbumsSearch represents the model behind the search form about `backend\modules\pegawai\models\Albums`.
 */
class AlbumsSearch extends Albums
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategori_id','object_id','id_album'], 'integer'],
            [['tgl_post', 'nama_album', 'keterangan','kata_kunci'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Albums::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => 5 // in case you want a default pagesize
            ],
            'sort' => [
                'defaultOrder' => [
                    'tgl_post' => SORT_ASC,
                ],
            ],
            
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('object');
        $query->joinWith('kategori');

        // grid filtering conditions
        $query->andFilterWhere([
            'id_album' => $this->id_album,
            'object_id'=>$this->object_id,
            'kategori_id'=>$this->kategori_id,
        ]);

        $query->andFilterWhere(['like', 'tgl_post', $this->tgl_post])
             ->andFilterWhere(['like', 'keterangan', $this->keterangan])
             ->andFilterWhere(['like', 'nama_album', $this->nama_album]);

        return $dataProvider;
    }
}
