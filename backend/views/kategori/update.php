<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kategori */

$this->title = 'Update Kategori' ;
$this->params['breadcrumbs'][] = ['label' => 'Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kategori-update">

    <center><h1><?= Html::encode($this->title) ?></h1></center><br>	

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<script src="../../js/jquery-2.1.4.min.js"></script> 
<script type="text/javascript" src="../../js/bootstrap-3.1.1.min.js"></script>