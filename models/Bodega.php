<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bodega".
 *
 * @property int $id_bodega
 * @property string|null $nome
 * @property string|null $origem
 *
 * @property Vinho[] $vinhos
 */
class Bodega extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bodega';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'origem'], 'default', 'value' => null],
            [['nome', 'origem'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bodega' => 'Id Bodega',
            'nome' => 'Nome',
            'origem' => 'Origem',
        ];
    }

    /**
     * Gets query for [[Vinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVinhos()
    {
        return $this->hasMany(Vinho::class, ['id_bodega' => 'id_bodega']);
    }

}
