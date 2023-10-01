<?php

namespace models;

use yii\data\ActiveDataProvider;
use models\Vacancy;

/**
 * VacancySearch represents the model behind the search form about `models\Vacancy`.
 */
class VacancySearch extends Vacancy
{
    const PAGINATION = 10;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title'], 'safe'],
        ];
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
        $query = Vacancy::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => self::PAGINATION]
        ]);

        $this->load($params);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'salary' => $this->salary,
        ]);

        return $dataProvider;
    }
}
