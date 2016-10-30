<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'alias') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'h1') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'articul') ?>

    <?php // echo $form->field($model, 'parent') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'podcat') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'price_r') ?>

    <?php // echo $form->field($model, 'edizm') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
