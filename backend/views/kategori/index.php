<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-index">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> BUAT KATEGORI', ['create'], 
            ['class' => 'btn btn-success','style'=>'padding:12px;']) ?>
    </p>

    <br>

    <?php
    $columns =[
            ['class' => 'kartik\grid\SerialColumn'],
            
            'kategori',
            
            [
                'class' => 'kartik\grid\ActionColumn',

                'template'=>'{update}{delete}',
                'buttons'=>[
                    'update'=> function($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url, [
                                    'title'=>Yii::t('app','update')
                        ]);
                    }, 
                    'delete'=> function($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url, [
                                    'title'=>Yii::t('app','deletealbum'),
                                    'data' => [
                                        'confirm' => 'Apakah anda yakin ingin menghapus data ini?',
                                        'method' => 'post',
                                    ],
                        ]);
                    },

                ],
                'urlCreator'=> function($action,$model,$key,$index){
                    if($action === 'update'){
                        $url = 'update?id='.$model->id_kategori;
                        return $url;
                    }
                    if($action === 'delete'){
                        $url = 'delete?id='.$model->id_kategori;
                        return $url;
                    }
                }
            ],
    ];
    ?>
    <?php Pjax::begin();?>
    <?=
        GridView::widget([
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => 'overflow: auto;word-wrap: break-word;width:60%;margin:0px auto'], 
        'columns' => $columns,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th"></i> Kategori</h3>',
            'type'=>'info',
        ],
        'striped' => false,
        'hover'=>true,
        'toolbar' => false,
        'responsiveWrap'=>false,
        'krajeeDialogSettings' => [ 
            'options' => [
                'type' => Dialog::TYPE_WARNING, 
                'title' => Yii::t('kvdialog', 'Konfirmasi'),
                'btnOKClass' => 'btn-warning',
                'btnOKLabel' => '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' 
                                . Yii::t('kvdialog', ' Ya'),
                'btnCancelLabel' => '<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>' 
                                    . Yii::t('kvdialog', ' Tidak')
            ]
        ],
        'summary' => "Kategori = {totalCount}",

    ]);
    ?>
    <?php Pjax::end();?>
</div>
