<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autor".
 *
 * @property int $idautor
 * @property string $nombre
 * @property string $apellido
 * @property string $nacionalidad
 *
 * @property Libro[] $libros
 */
class Autor extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'nacionalidad'], 'required'],
            [['nombre', 'apellido', 'nacionalidad'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idautor' => Yii::t('app', 'Idautor'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
            'nacionalidad' => Yii::t('app', 'Nacionalidad'),
        ];
    }

    /**
     * Gets query for [[Libros]].
     *
     * @return \yii\db\ActiveQuery|LibroQuery
     */
    public function getLibros()
    {
        return $this->hasMany(Libro::class, ['autor_idautor' => 'idautor']);
    }

    /**
     * {@inheritdoc}
     * @return AutorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutorQuery(get_called_class());
    }

}
