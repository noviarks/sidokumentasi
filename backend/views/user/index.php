<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> BUAT AKUN', ['signup'], 
            ['class' => 'btn btn-success','style'=>'padding:12px;']) ?>
    </p>
    
    <br>

    <?php
        $columns =[
            ['class' => 'kartik\grid\SerialColumn'],
            
            'username',
            'email:email',
            'level',

            ['class' => 'kartik\grid\ActionColumn',

                'template'=>'{update}{view}',
                'buttons'=>[
                    'update'=> function($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url, [
                                    'title'=>Yii::t('app','update')
                        ]);
                    },
                    'view'=> function($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url, [
                                    'title'=>Yii::t('app','view')
                        ]);
                    },  
                    

                ],

                'urlCreator'=> function($action,$model,$key,$index){
                    if($action === 'update'){
                        $url = 'update?id='.$model->id;
                        return $url;
                    }
                    if($action === 'view'){
                        $url = 'view?id='.$model->id;
                        return $url;
                    }
                }

                /*'urlCreator'=> function($action,$model,$key,$index){
                    if($action === 'view'){
                        $url = 'view?id='.$model->id;
                        return $url;
                    }
                  
                }*/
            ] 
                
        ];
    ?>

    <?=
        GridView::widget([
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => 'overflow: auto;word-wrap: break-word;'], 
        'columns' => $columns,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> User</h3>',
            'type'=>'info',
        ],
        'striped' => false,
        'hover'=>true,
        'toolbar' => false,
        'responsive'=>false,

        'summary' => "Jumlah User = {totalCount}",

    ]);
    ?>

   

</div>
