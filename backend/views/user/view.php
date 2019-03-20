<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\User */
if(Yii::$app->user->identity->level == "admin" || Yii::$app->user->identity->level == "pegawai") {
    $this->title = "Lihat User";
    $this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}
else{
    $this->title = "Akun Saya";
}


?>

<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?php if($model->username != Yii::$app->user->identity->username) {?>
            <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
                    Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])
            ?>

            <?= Dialog::widget([
                'overrideYiiConfirm' => true,
                'options' => [  
                    'type' => Dialog::TYPE_WARNING, 
                    'title' => Yii::t('kvdialog', 'Konfirmasi'),
                    'btnOKClass' => 'btn-warning',
                    'btnOKLabel' => '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' 
                                    . Yii::t('kvdialog', ' Ya'),
                    'btnCancelLabel' => '<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>' 
                                        . Yii::t('kvdialog', ' Tidak')
                ],
            ]);?>

            <?= Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus User'
                , ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Apakah anda yakin ingin menghapus data ini?',
                        'method' => 'post',
                    ],
            ]) ?>

        <?php } ?> 


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:email',
            'level',
        ],
    ]) ?>


</div>

<?php if($model->username == Yii::$app->user->identity->username) {?>
    <script src="../../js/jquery-2.1.4.min.js"></script> 
    <script type="text/javascript" src="../../js/bootstrap-3.1.1.min.js"></script>
<?php } ?>