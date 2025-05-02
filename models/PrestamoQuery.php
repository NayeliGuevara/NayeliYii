<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Prestamo]].
 *
 * @see Prestamo
 */
class PrestamoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Prestamo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Prestamo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
