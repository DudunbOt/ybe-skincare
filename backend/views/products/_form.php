<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descriptions')->widget(CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>



    <?= $form->field($model, 'imageFile', [
      'template' => '
          <div class="custom-file mb-3">
            {input}
            {label}
            {error}
          </div>
      ',
      'inputOptions' => ['class' => 'custom-file-input'],
      'labelOptions' => ['class' => 'custom-file-label']
      ])->textInput(['type' => 'file']) ?>

    <?= $form->field($model, 'price')->textInput([
      'maxlength' => true,
      'type' => 'number',
      ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
