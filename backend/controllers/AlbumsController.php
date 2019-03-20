<?php

namespace backend\controllers;

use Yii;
use backend\models\Albums;
use backend\models\Fotos;
use backend\models\Objects;
use backend\models\AlbumsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use yii\helpers\Json;

/**
 * AlbumsController implements the CRUD actions for Albums model.
 */
class AlbumsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionTest(){
        echo "test";
    }
    /**
     * Lists all Albums models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlbumsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        

        /*filter untuk suggestion pada searching*/
        $allData = $dataProvider->query->orderBy('tgl_post ASC')->all();
        $foto = Fotos::find()->all();
        $foto_home = Fotos::find()->where('status = "tampil home"')->count();
        $albums = Albums::find()->groupBy('nama_album')->orderBy('tgl_post ASC')->all();
        $tanggals = Albums::find()->groupBy('tgl_post')->all();
      
        $temp = 0;
        $data_album = array();
        $data_tgl = array();
       
        /*menampilkan filter kata kunci & tgl*/
        foreach($albums as $alb){
            $data_album[] = $alb['nama_album'];
        }

        foreach ($tanggals as $tgls) {        
            $data_tgl[] = $tgls['tgl_post'];   
        }

        $album = count($data_album);
        $tgl = count($data_tgl);
        
        if($allData != null){
            foreach ($allData as $all) {
                /*untuk mengetahui jumlah foto berdasarkan data yg ditampilkan*/
                foreach ($foto as $f) {
                    if($all['id_album'] == $f['album_id']){
                        $temp++;
                    }
                }
            }

        }
        
        if(empty($data_album) || empty($data_tgl)){
            $data_album[] = " ";
            $data_tgl[] = " ";
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data_album' => $data_album,
            'data_tgl' => $data_tgl,
            'album' => $album,
            'tgl' => $tgl,
            'temp' => $temp,
            'foto_home' => $foto_home,
        ]);
    }

    /**
     * Displays a single Albums model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = Albums::findOne($id);
        if(!empty($model)){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else{
            echo "Data telah terhapus";
        }

    }
    
    /**
     * Creates a new Albums model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Albums;
        
        if ($model->load(Yii::$app->request->post()) ) {
            $model->user_id = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_album]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Albums model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);

        if(!empty($model)){
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_album]);
            } else {
                

                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        
    }
    public function actionDelete($id)
    {
        $model = Fotos::find()->where(['album_id'=> $id])->all();

        $this->findModel($id)->delete();

        foreach($model as $hapusAlbum){
            unlink(Yii::$app->basePath.'/web/Foto/compress/'.$hapusAlbum->foto);
        }
        
        if(!Yii::$app->request->isAjax){
            return $this->redirect(['index']);
        }
    }
    /**
     * Deletes an existing Albums model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
  
    /**
     * Finds the Albums model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Albums the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Albums::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
