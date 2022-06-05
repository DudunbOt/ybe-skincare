<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Products;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
              'attribute' => 'id',
              'contentOptions' => [
                'style' => 'width: 50px'
              ]
            ],

            'name',

            [
              'attribute' => 'image',
              'content' => function($model){
                return Html::img($model->getImgUrl(), ['style' => 'width: 50px']);
              }
            ],

            'price',

            [
              'attribute' => 'status',
              'content' => function($model){
                return Html::tag('span', $model->status ? 'Published' : 'Unpublished',[
                  'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                ])
              }
            ],

            [
                'attribute' => 'created_at',
                'format' => ['datetime'],
                'contentOptions' => ['style' => 'white-space: nowrap']
            ],

            [
                'attribute' => 'updated_at',
                'format' => ['datetime'],
                'contentOptions' => ['style' => 'white-space: nowrap']
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\models\Products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
