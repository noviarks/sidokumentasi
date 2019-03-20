<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\select2\Select2;
use kartik\typeahead\Typeahead;
use yii\helpers\ArrayHelper;
use backend\models\Albums;
use backend\models\Objects;
use backend\models\Kategori;
use backend\models\Fotos;
use kartik\dialog\Dialog;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $searchModel backend\modules\pegawai\models\AlbumsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Album';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albums-index">
    
    <?php if(Yii::$app->user->isGuest == false) {?>
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> BUAT ALBUM'
                , ['create'], ['class' => 'btn btn-success','style'=>'padding:12px;']) ?>

        <?= Html::a('<span class="glyphicon glyphicon-picture" aria-hidden="true"></span> FOTO HOME = '.$foto_home
                , ['fotos/view-home'], ['class' => 'btn btn-primary','style'=>'padding:12px;
                float:right']) ?>
    <?php } ?>
            
   
        
    <?= Html::a('<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> RESET PENCARIAN'
                , ['/albums/index'], ['class' => 'btn btn-danger','style'=>'padding:12px;']) ?>     

     </p><br>
    
    <?php
        $columns =[
            ['class' => 'kartik\grid\SerialColumn'],
            
            [
                'attribute'=>'object_id',
                'width'=>'210px',
                'value' => 'object.nama_object',
                'filter'=> ArrayHelper::map(Objects::find()->asArray()->all(),'id_object','nama_object'),
                'filterInputOptions' => [
                'class'       => 'form-control',
                'prompt' => 'All Object...'
                 ]
            
            ],

            [
                'attribute'=>'kategori_id',
                'width'=>'210px',
                'value' => 'kategori.kategori',
                'filter'=> ArrayHelper::map(Kategori::find()->asArray()->all(),'id_kategori','kategori'),
                'filterInputOptions' => [
                'class'       => 'form-control',
                'prompt' => 'All Kategori...'
                 ]
            
            ],

            [
                'attribute' => 'tgl_post',
                'width'=>'210px',
                'label' => 'Tgl Kegiatan',
                'filterType' => GridView::FILTER_TYPEAHEAD,
                'filterWidgetOptions' => [
                    'pluginOptions' => ['highlight' => true],
                    'dataset' => [['local'=>$data_tgl,'limit'=>$tgl]],
                    'defaultSuggestions' => $data_tgl,
                    'scrollable'=>true,
                ],
                'filterInputOptions' => ['placeholder' => 'Tgl Kegiatan...'],
                'format' => 'raw'
            ],
            
            [
                'attribute' => 'nama_album',
                'label' => 'Nama Album',
                'filterType' => GridView::FILTER_TYPEAHEAD,
                'filterWidgetOptions' => [
                    'pluginOptions' => ['highlight' => true],
                    'dataset' => [['local'=>$data_album,'limit'=>$album]],
                    'defaultSuggestions' => $data_album,
                    'scrollable'=>true,
                ],
                'filterInputOptions' => ['placeholder' => 'Album...'],
                'format' => 'raw'
            ],
     
            [
                'class' => 'kartik\grid\ActionColumn',

                'template'=>'{view}',
                'buttons'=>[
                    'view'=> function($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url, [
                                    'title'=>Yii::t('app','view')
                        ]);
                    }, 


                ],
                'urlCreator'=> function($action,$model,$key,$index){
                    if($action === 'view'){
                        $url = 'view?id='.$model->id_album;
                        return $url;
                    }
                  
                }
            ],
        ];
    ?>

    
    <?=
        GridView::widget([
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => 'break-word:break-all;width:100%'], 
        'columns' => $columns,

        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Album</h3>',
            'type'=>'info',
     
        ],
        'striped' => false,
        'hover'=>true,
        'toolbar' => false,
        'persistResize' => false,
        'responsive' =>false,
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

        'summary' => "Album = {totalCount} || Foto = $temp",
    ]);
    ?>


</div>