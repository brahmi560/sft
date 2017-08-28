<?php

namespace backend\modules\techcategories\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\techcategories\models\TechCategories;

/**
 * TechCategoriesSearch represents the model behind the search form about `backend\modules\techcategories\models\TechCategories`.
 */
class TechCategoriesSearch extends TechCategories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['techCatId', 'createdBy', 'updatedBy'], 'integer'],
            [['techCategoryName', 'techCatDescription', 'status', 'createdDate', 'updatedDate'], 'safe'],
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
        $query = TechCategories::find();

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
            'techCatId' => $this->techCatId,
            'createdBy' => $this->createdBy,
            'updatedBy' => $this->updatedBy,
            'createdDate' => $this->createdDate,
            'updatedDate' => $this->updatedDate,
        ]);

        $query->andFilterWhere(['like', 'techCategoryName', $this->techCategoryName])
            ->andFilterWhere(['like', 'techCatDescription', $this->techCatDescription])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
