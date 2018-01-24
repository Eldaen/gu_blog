<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Blogentry;

/**
 * BlogentrySearch represents the model behind the search form of `app\models\Blogentry`.
 */
class BlogentrySearch extends Blogentry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'viewed', 'user_id'], 'integer'],
            [['title', 'preview', 'body', 'date'], 'safe'],
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
        $query = Blogentry::find();

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
            'viewed' => $this->viewed,
            'user_id' => $this->user_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'preview', $this->preview])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }
}