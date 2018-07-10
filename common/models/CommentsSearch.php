<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Comments;

/**
 * CommentsSearch represents the model behind the search form of `common\models\Comments`.
 */
class CommentsSearch extends Comments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'offers_id', 'isapproved'], 'integer'],
            [['comment', 'user', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Comments::find();

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
            'offers_id' => $this->offers_id,
            'isapproved' => $this->isapproved,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'user', $this->user]);

        return $dataProvider;
    }
}
