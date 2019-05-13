<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kaiji;

/**
 * KaijiSearch represents the model behind the search form about `app\models\Kaiji`.
 */
class KaijiSearch extends Kaiji
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'title', 'que', 'a', 'b', 'c', 'd', 'answer', 'analysis'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Kaiji::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'que', $this->que])
            ->andFilterWhere(['like', 'a', $this->a])
            ->andFilterWhere(['like', 'b', $this->b])
            ->andFilterWhere(['like', 'c', $this->c])
            ->andFilterWhere(['like', 'd', $this->d])
            ->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'analysis', $this->analysis]);

        return $dataProvider;
    }
}
