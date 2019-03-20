<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\User */

$this->title = 'Update User';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['user/index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><center><?= Html::encode($this->title) ?></h1></center><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<script src="../../js/jquery-2.1.4.min.js"></script> 
<script type="text/javascript" src="../../js/bootstrap-3.1.1.min.js"></script>