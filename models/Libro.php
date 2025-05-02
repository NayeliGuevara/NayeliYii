<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libro".
 *
 * @property int $idlibro
 * @property string $titulo
 * @property string $año_publicacion
 * @property int $autor_idautor
 * @property int $genero_idgenero
 *
 * @property Autor $autorIdautor
 * @property Genero $generoIdgenero
 * @property Prestamo[] $prestamos
 */
class Libro extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'año_publicacion', 'autor_idautor', 'genero_idgenero'], 'required'],
            [['año_publicacion'], 'safe'],
            [['autor_idautor', 'genero_idgenero'], 'integer'],
            [['titulo'], 'string', 'max' => 256],
            [['autor_idautor'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::class, 'targetAttribute' => ['autor_idautor' => 'idautor']],
            [['genero_idgenero'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::class, 'targetAttribute' => ['genero_idgenero' => 'idgenero']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idlibro' => Yii::t('app', 'Idlibro'),
            'titulo' => Yii::t('app', 'Titulo'),
            'año_publicacion' => Yii::t('app', 'Año de Publicacion'),
            'autor_idautor' => Yii::t('app', 'Autor'),
            'genero_idgenero' => Yii::t('app', 'Genero '),
        ];
    }

    /**
     * Gets query for [[AutorIdautor]].
     *
     * @return \yii\db\ActiveQuery|AutorQuery
     */
    public function getAutorIdautor()
    {
        return $this->hasOne(Autor::class, ['idautor' => 'autor_idautor']);
    }

    /**
     * Gets query for [[GeneroIdgenero]].
     *
     * @return \yii\db\ActiveQuery|GeneroQuery
     */
    public function getGeneroIdgenero()
    {
        return $this->hasOne(Genero::class, ['idgenero' => 'genero_idgenero']);
    }

    /**
     * Gets query for [[Prestamos]].
     *
     * @return \yii\db\ActiveQuery|PrestamoQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamo::class, ['libro_idlibro' => 'idlibro']);
    }

    /**
     * {@inheritdoc}
     * @return LibroQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibroQuery(get_called_class());
    }

}
