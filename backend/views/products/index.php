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

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'id',
                    'contentOptions' => [
                        'style' => 'width: 60px'
                    ]
                ],
                [
                    'label' => 'Image',
                    'attribute' => 'image',
                    'content' => function ($model) {
                        /** @var \common\models\Product $model */
                        return Html::img($model->getImgUrl(), ['style' => 'width: 50px']);
                    }
                ],
                [
                    'attribute' => 'name',
                    'content' => function ($model) {
                        return \yii\helpers\StringHelper::truncateWords($model->name, 7);
                    }
                ],
                'price',
                [
                    'attribute' => 'status',
                    'content' => function ($model) {
                        /** @var \common\models\Product $model */
                        return Html::tag('span', $model->status ? 'Published' : 'Unpublished', [
                            'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                        ]);
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
                    'class' => 'common\grid\ActionColumn',
                    'contentOptions' => [
                        'class' => 'td-actions'
                    ]
                ],
            ],
        ]); ?>
    </div>


</div>
