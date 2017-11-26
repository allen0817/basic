<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/21
 * Time: 00:37
 */

?>

<?= yii\bootstrap\Alert::widget([
    'options' => [
        'class' => 'alert-info',
    ],
    'body' => '保存失败！',
]);
?>


<?= \hyii2\avatar\AvatarWidget::widget(['imageUrl' => Yii::getAlias('@web').'/images/gril.jpg']); ?>


<?php $form = \yii\widgets\ActiveForm::begin(); ?>



<?php

echo '<label class="control-label">Add Attachments</label>';
echo \kartik\file\FileInput::widget([
    'model' => $model,
    'attribute' => 'pics',
    'options' => ['multiple' => true,],
    'pluginOptions' => [
        'languages' => 'zh'
    ]
]);

?>




<?php \yii\widgets\ActiveForm::end() ?>
