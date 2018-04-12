<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property int $rut
 * @property string $nombre
 * @property string $apellido
 * @property int $edad
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rut', 'nombre', 'apellido', 'edad'], 'required'],
            [['rut', 'edad'], 'integer'],
            [['nombre'], 'string', 'max' => 200],
            [['apellido'], 'string', 'max' => 10],
            [['edad'],'integer', 'max'=>120],
            [['rut'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rut' => 'Rut',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'edad' => 'Edad',
        ];
    }
}
