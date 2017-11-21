<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/19
 * Time: 22:54
 */

$this->title= 'test';
$this->params['breadcrumbs'][] = $this->title;

?>


<?php  $form = \yii\widgets\ActiveForm::begin([]) ?>

    <?= $form->field($model,'name',['options'=>[
    'inputTemplate' => '<div class="input-group col-lg-1"><span class="input-group-addon">@</span>{input}</div>',
]]) ?>

    <?= $form->field($model,'password')->passwordInput() ?>

    <?= $form->field($model,'email')->textInput() ?>

    <?= $form->field($model,'captcha')->widget(\yii\captcha\Captcha::className())->label('验证码') ?>


<?php  \yii\widgets\ActiveForm::end() ?>
