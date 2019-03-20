<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\Albums */

$this->title = 'Buat Album';
$this->params['breadcrumbs'][] = ['label' => 'Album', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albums-create">

    <center><h1><?= Html::encode($this->title) ?></h1></center> <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>