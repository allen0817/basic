<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/23
 * Time: 23:44
 */

?>


<h1>index hello world</h1>


<?=\yii\helpers\Html::button('click',['class'=>'bg-success','id'=>'click']) ?>


<?php $this->beginBlock("a") ?>


$(document).ready(function(){
    $("#click").click(function(){
        $.get('<?=\yii\helpers\Url::to(["jump"])?>');
    });
});



<?php $this->endBlock() ?>


<?php $this->registerJs($this->blocks['a'],\yii\web\View::POS_END)  ?>
