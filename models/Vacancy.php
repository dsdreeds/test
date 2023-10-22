<?php

namespace models;

use \yii\db\ActiveRecord;

/**
 * This is the model class for table "vacancy".
 *
 * @property integer $id
 * @property string $title
 * @property string $salary
 * @property string $description
 * @property string $created_at
 */
class Vacancy extends ActiveRecords
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            ['salary', 'number'],
            ['description', 'text'],
            [['created_at', 'title'], 'string'],
            [['salary', 'description', 'title', 'created_at'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'salary' => 'Зарплата',
            'created_at' => 'Дата создания',
        ];
    }

    /**
     * @inheritdoc
    */
    public function fields()
    {
        return [
            'id',
            'salary',
            'description',
            'title',
            'created_at'
        ];
    }

}
