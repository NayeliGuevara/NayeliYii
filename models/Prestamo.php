<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prestamo".
 *
 * @property int $idprestamo
 * @property int $libro_idlibro
 * @property int $usuario_idusuario
 * @property string $fecha_prestamo
 * @property string $fecha_devolucion
 *
 * @property Libro $libroIdlibro
 * @property Usuario $usuarioIdusuario
 */
class Prestamo extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prestamo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['libro_idlibro', 'usuario_idusuario', 'fecha_prestamo', 'fecha_devolucion'], 'required'],
            [['libro_idlibro', 'usuario_idusuario'], 'integer'],
            [['fecha_prestamo', 'fecha_devolucion'], 'safe'],
            [['libro_idlibro'], 'exist', 'skipOnError' => true, 'targetClass' => Libro::class, 'targetAttribute' => ['libro_idlibro' => 'idlibro']],
            [['usuario_idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::class, 'targetAttribute' => ['usuario_idusuario' => 'idusuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idprestamo' => Yii::t('app', 'Idprestamo'),
            'libro_idlibro' => Yii::t('app', 'Libro '),
            'usuario_idusuario' => Yii::t('app', 'Usuario'),
            'fecha_prestamo' => Yii::t('app', 'Fecha de Prestamo'),
            'fecha_devolucion' => Yii::t('app', 'Fecha de Devolucion'),
        ];
    }

    /**
     * Gets query for [[LibroIdlibro]].
     *
     * @return \yii\db\ActiveQuery|LibroQuery
     */
    public function getLibroIdlibro()
    {
        return $this->hasOne(Libro::class, ['idlibro' => 'libro_idlibro']);
    }

    /**
     * Gets query for [[UsuarioIdusuario]].
     *
     * @return \yii\db\ActiveQuery|UsuarioQuery
     */
    public function getUsuarioIdusuario()
    {
        return $this->hasOne(Usuario::class, ['idusuario' => 'usuario_idusuario']);
    }

    /**
     * {@inheritdoc}
     * @return PrestamoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PrestamoQuery(get_called_class());
    }

}
