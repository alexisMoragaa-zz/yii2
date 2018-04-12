<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country2".
 *
 * @property string $cod
 * @property string $name
 * @property int $population
 */
class Country2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cod', 'name', 'population'], 'required'],
            [['population'], 'integer'],
            [['cod'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 52],
            [['cod'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'name' => 'Name',
            'population' => 'Population',
        ];
    }
}
