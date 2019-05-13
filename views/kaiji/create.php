<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kaiji */

$this->title = Yii::t('app', 'Create Kaiji');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kaijis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kaiji-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
