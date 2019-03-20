 <?php

use yii\helpers\Html;
use backend\models\Fotos;
/* @var $this yii\web\View */
/* @var $model backend\models\Fotos */

$this->title = 'Update Foto';
$this->params['breadcrumbs'][] = ['label' => 'Lihat Foto', 'url' => ['fotos/view','id'=>$model->id_foto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fotos-update">

    <br><h1><center><?= Html::encode($this->title) ?></center></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<script src="../../js/jquery-2.1.4.min.js"></script> 
<script type="text/javascript" src="../../js/bootstrap-3.1.1.min.js"></script>