<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KaijiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kaiji-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'que') ?>

    <?= $form->field($model, 'a') ?>

    <?php // echo $form->field($model, 'b') ?>

    <?php // echo $form->field($model, 'c') ?>

    <?php // echo $form->field($model, 'd') ?>

    <?php // echo $form->field($model, 'answer') ?>

    <?php // echo $form->field($model, 'analysis') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
