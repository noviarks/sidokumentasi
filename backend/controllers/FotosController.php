<?php

namespace backend\controllers;

use Yii;
use backend\models\Fotos;
use backend\models\Albums;
use yii\web\UploadedFile;
use yii\imagine\Image; 
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use backend\models\FotosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FotosController implements the CRUD actions for Fotos model.
 */
class FotosController extends Controller
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

    /**
     * Lists all Fotos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FotosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fotos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = Fotos::findOne($id);

        if(!empty($model)){
            return $this->render('view', [
                'model' => $model ,
            ]);
        }
        else{
            echo "Data telah terhapus";
        }
    }

    public function actionViewHome()
    {
        
        return $this->render('view-home');
    }

    /**
     * Creates a new Fotos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUpload($id)
    {
        $upload = new Fotos();
        $upload->album_id = $id;
        $albums = Albums::find()->where(['id_album' => $upload->album_id])->all();

        
        if($upload->load(Yii::$app->request->post())){
            $upload->foto = UploadedFile::getInstances($upload,'foto');
            if($upload->foto && $upload->validate()){
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/Foto/';
                $path = Yii::$app->params['uploadPath'];

                if(!file_exists($path)){
                    mkdir($path,0777,true);
                }
            foreach($albums as $album){
                foreach($upload->foto as $foto){
                    $model = new Fotos();
                    $model->album_id = $upload->album_id;
                    $model->foto = $foto->name;
                    $tmp = explode('.', $foto->name);
                    $ext = end($tmp);
                    $model->nama = $foto->basename;
                    $model->foto = Yii::$app->security->generateRandomString().".{$ext}";
                    $model->status = "Tidak Tampil Home";
                    $model->prioritas_home = '0';
                    $model->user_id = Yii::$app->user->identity->id;
                    
                    if($model->save(false)){
                        
                        if($album->terbaru == 'tidak'){

                            $foto->saveAs($path.$model->foto);
                            ini_set('memory_limit','1000M');
                            
                            if($foto->size > 2500000){
                                Image::thumbnail($path.$model->foto, 4500, 3000)
                                    ->save($path.'compress/'.$model->foto,['quality' => 90]);
                            }
                            else{
                                Image::thumbnail($path.$model->foto, 6000, 4000)
                                    ->save($path.'compress/'.$model->foto,['quality' => 98]);
                            }
                           unlink(Yii::$app->basePath.'/web/Foto/'.$model->foto);
                        }

                        $foto->saveAs($path.'compress/'.$model->foto);
                        
                    }
                }

            }
                
                return $this->redirect(['albums/view', 'id' => $upload->album_id]);
            }
        }


        return $this->render('upload', [
            'upload' => $upload, 'albums' => ArrayHelper::map($albums,'id_album','nama_album'),
        ]);
    }

    /**
     * Updates an existing Fotos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(!empty($model)){
            if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id_foto]);
            } else {
                return $this->render('update', [
                        'model' => $model ,
                    ]);
                }
        }
        else{
                echo "Data telah terhapus";
            }
    }

    public function actionUpdateHome($id)
    {
        $model = $this->findModel($id);

        if(!empty($model)){
            if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
                return $this->redirect('view-home');
            } else {
                return $this->render('update-home', [
                        'model' => $model ,
                    ]);
                }
        }
        else{
                echo "Data telah terhapus";
            }
    }

    /**
     * Deletes an existing Fotos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = Fotos::find()->where(['id_foto'=>$id])->one();
        $modelHapus = Fotos::find()->where(['id_foto'=>$id])->all();

        if($model->delete()){
            foreach($modelHapus as $hapusFoto){
                unlink(Yii::$app->basePath.'/web/Foto/compress/'.$hapusFoto->foto);
            }

             if($model->next == null ){
                if($model->prev != null){
                    return $this->redirect(['fotos/view','id'=>$model->prev->id_foto]);
                }
                if($model->prev == null){
                    return $this->redirect(['albums/view','id'=>$model->album_id]);
                }
            }
            if($model->next != null ){
                return $this->redirect(['fotos/view','id'=>$model->next->id_foto]);
            }
        }
    }

    public function actionDownload($foto,$id)
    {

        $model = Fotos::find()->where(['id_foto'=>$id])->all();

       Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/Foto/compress/';
       $storagePath = Yii::$app->params['uploadPath'];

       foreach($model as $mod){
            Yii::$app->db->createCommand("UPDATE albums SET download = download + 1 
                WHERE id_album = ".$mod->album_id)->execute();
        }
       
       return Yii::$app->response->sendFile("$storagePath/$foto", $foto);

    }

    /**
     * Finds the Fotos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fotos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fotos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
