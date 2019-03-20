<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Kategori */

$this->title = 'Buat Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-create">

    <h1><center><?= Html::encode($this->title) ?></center></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
