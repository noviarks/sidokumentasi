<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\masyarakat\models\Objects */

$this->title = 'Buat Object';
$this->params['breadcrumbs'][] = ['label' => 'Object', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objects-create">

    <center><h1><?= Html::encode($this->title) ?></h1></center> <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<script src="../../js/jquery-2.1.4.min.js"></script> 
<script type="text/javascript" src="../../js/bootstrap-3.1.1.min.js"></script>