<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create News'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '第{begin}-{end}页，共计{totalCount}篇文章',

        'pager' => [
            'prevPageLabel' => '前一页',
            'hideOnSinglePage' => false,
        ],
        'columns' => [
            ['class' => '\kartik\grid\CheckboxColumn'],  //第0列
            [
                'class' => \liyunfang\contextmenu\SerialColumn::className(),
                'contextMenu' => true,
                //'contextMenuAttribute' => 'id',
//                'buttons'    => [
//                    'view' => function ($url, $model){
//                        $title = Yii::t('kvgrid', 'View');
//                        $label = '<span class="glyphicon glyphicon-eye-open"></span> ' . $title;
//                        $options = ['tabindex' => '-1', 'title' => $title, 'data' => ['pjax' => '0' ,  'toggle' => 'tooltip'], 'target'=>'_blank'];
//                        return '<li>' . Html::a($label, $url, $options) . '</li>' . PHP_EOL;
//                    },
//                ],

                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('', '#', [
                                'data-toggle' => 'modal',
                                'data-target' => '#display-modal',
                                'class' => 'data-update glyphicon glyphicon-edit',
                                'data-id' => $key,
                            ]).'&nbsp;&nbsp;&nbsp;';
                    },
                    'view' => function($url, $model, $key){
                        return Html::a('', '#', [
                                    'data-toggle' => 'modal',
                                    'data-target' => '#display-modal',
                                    'class' => 'data-dones glyphicon glyphicon-edit',
                                    'data-id' => $key,
                                ]).'&nbsp;&nbsp;&nbsp;';
                        }
                ],


            ],

            'id',
            'title',

            [
                'attribute'=>'created_at',
                'filter' => [
                    0 => '测试0',
                    1 => '测试1'
                ]
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'rowOptions' => function($model, $key, $index, $gird){
            $contextMenuId = $gird->columns[1]->contextMenuId;
            return ['data'=>[ 'toggle' => 'context','target'=> "#".$contextMenuId ]];
        },
    ]); ?>
</div>

<script>
<?php $this->beginBlock('abc'); ?>

<?php $this->endBlock(); ?>
</script>


<?php  $this->registerJs($this->blocks['abc'],\yii\web\View::POS_END); ?>











