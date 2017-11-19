<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%news_detail}}".
 *
 * @property integer $id
 * @property string $detail
 *
 * @property News $id0
 */
class NewsDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detail'], 'string'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'detail' => Yii::t('app', 'Detail'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(News::className(), ['id' => 'id']);
    }
}
