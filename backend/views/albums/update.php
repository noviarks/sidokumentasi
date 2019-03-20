<?php

use yii\helpers\Html;
use backend\models\Albums;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\Albums */

$this->title = 'Update Album';
$this->params['breadcrumbs'][] = ['label' => 'Lihat Album', 'url' => ['albums/view','id'=>$model->id_album]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="albums-update">

    <br><center><h1><?= Html::encode($this->title) ?></h1></center><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
