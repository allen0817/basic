<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%kaiji}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $que
 * @property string $a
 * @property string $b
 * @property string $c
 * @property string $d
 * @property string $answer
 * @property string $analysis
 */
class Kaiji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%kaiji}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['analysis'], 'string'],
            [['name', 'title', 'que', 'a', 'b', 'c', 'd', 'answer'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '课程'),
            'title' => Yii::t('app', '题型'),
            'que' => Yii::t('app', '题干'),
            'a' => Yii::t('app', 'A'),
            'b' => Yii::t('app', 'B'),
            'c' => Yii::t('app', 'C'),
            'd' => Yii::t('app', 'D'),
            'answer' => Yii::t('app', '正确答案'),
            'analysis' => Yii::t('app', '答案解析'),
        ];
    }
}
