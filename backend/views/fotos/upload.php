																																																										<?php
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\Fotos */

$this->title = 'Upload Foto';
$this->params['breadcrumbs'][] = ['label' => 'Album', 'url' => ['albums/index']];
$this->params['breadcrumbs'][] = ['label' => 'Lihat Album', 'url' => ['albums/view','id'=>$upload->album_id]];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="fotos-create">

    <center><h1><?= Html::encode($this->title) ?></h1></center> <br>

    <?= $this->render('_form_upload', [
        'upload' => $upload,
        'albums' => $albums,
    ]) ?>

</div>

<script src="../../js/jquery-2.1.4.min.js"></script> 
<script type="text/javascript" src="../../js/bootstrap-3.1.1.min.js"></script>