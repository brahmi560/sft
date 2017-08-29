<?php

namespace backend\modules\technologiesinformation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\technologiesinformation\models\TechnologiesInformation;

/**
 * TechnologiesInformationSearch represents the model behind the search form about `backend\modules\technologiesinformation\models\TechnologiesInformation`.
 */
class TechnologiesInformationSearch extends TechnologiesInformation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['technologyInfoId', 'technologyId', 'createdBy', 'updatedBy'], 'integer'],
            [['technologySiteName', 'technologyUrl', 'technologyDescription', 'status', 'createdDate', 'updatedDate', 'techinfoMetaTitle', 'techinfoMetaKey', 'techinfoMetaDescription', 'techinfoPageTitle'], 'safe'],
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
        $query = TechnologiesInformation::find();

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
            'technologyInfoId' => $this->technologyInfoId,
            'technologyId' => $this->technologyId,
            'createdBy' => $this->createdBy,
            'updatedBy' => $this->updatedBy,
            'createdDate' => $this->createdDate,
            'updatedDate' => $this->updatedDate,
        ]);

        $query->andFilterWhere(['like', 'technologySiteName', $this->technologySiteName])
            ->andFilterWhere(['like', 'technologyUrl', $this->technologyUrl])
            ->andFilterWhere(['like', 'technologyDescription', $this->technologyDescription])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'techinfoMetaTitle', $this->techinfoMetaTitle])
            ->andFilterWhere(['like', 'techinfoMetaKey', $this->techinfoMetaKey])
            ->andFilterWhere(['like', 'techinfoMetaDescription', $this->techinfoMetaDescription])
            ->andFilterWhere(['like', 'techinfoPageTitle', $this->techinfoPageTitle]);

        return $dataProvider;
    }
}
