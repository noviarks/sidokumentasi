<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\SignupForm;
use yii\db\Query;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['index','login','signup', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'home';
        
        //menampilkan jumlah foto tiap object
        $query = new Query;
        $query->select('nama_object')
                ->from('objects,albums,fotos')
                ->where('id_object = object_id AND id_album = album_id');
                $command = $query->createCommand();
                $data = $command->queryAll();
                $gub = 0;
                $wagub = 0;
                $bugub = 0;
                $buwagub = 0;
                $sekda = 0;
                $busekda = 0;
                foreach ($data as $d) {
                    if($d['nama_object'] == "Gubernur"){
                        $gub++;
                    }
                    if($d['nama_object'] == "Wagub"){
                        $wagub++;
                    }
                    if($d['nama_object'] == "Bu Gub"){
                        $bugub++;
                    }
                    if($d['nama_object'] == "Bu Wagub"){
                        $buwagub++;
                    }
                    if($d['nama_object'] == "Sekda"){
                        $sekda++;
                    }
                    if($d['nama_object'] == "Bu Sekda"){
                        $busekda++;
                    }
                }
        return $this->render('index',[
                'gub' => $gub,
                'wagub' => $wagub,
                'bugub' => $bugub,
                'buwagub' => $buwagub,
                'sekda' => $sekda,
                'busekda' => $busekda,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            $model->level = "masyarakat";
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        $this->redirect(Yii::$app->user->returnUrl);
    }
}
