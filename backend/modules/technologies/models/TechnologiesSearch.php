<?php

namespace backend\modules\technologies\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\technologies\models\Technologies;

/**
 * TechnologiesSearch represents the model behind the search form about `backend\modules\technologies\models\Technologies`.
 */
class TechnologiesSearch extends Technologies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['techId', 'techCategoryId', 'createdBy', 'updatedBy'], 'integer'],
            [['techName', 'techDescription', 'status', 'techMetaTitle', 'techMetaKey', 'techMetaDescription', 'techPageTitle', 'createdDate', 'updatedDate'], 'safe'],
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
        $query = Technologies::find();

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
            'techId' => $this->techId,
            'techCategoryId' => $this->techCategoryId,
            'createdBy' => $this->createdBy,
            'updatedBy' => $this->updatedBy,
            'createdDate' => $this->createdDate,
            'updatedDate' => $this->updatedDate,
        ]);

        $query->andFilterWhere(['like', 'techName', $this->techName])
            ->andFilterWhere(['like', 'techDescription', $this->techDescription])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'techMetaTitle', $this->techMetaTitle])
            ->andFilterWhere(['like', 'techMetaKey', $this->techMetaKey])
            ->andFilterWhere(['like', 'techMetaDescription', $this->techMetaDescription])
            ->andFilterWhere(['like', 'techPageTitle', $this->techPageTitle]);

        return $dataProvider;
    }
}
