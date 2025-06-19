<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_vinho".
 *
 * @property int $id_tipo_vinho
 * @property string|null $descricao
 *
 * @property Vinho[] $vinhos
 */
class TipoVinho extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_vinho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'default', 'value' => null],
            [['descricao'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_vinho' => 'Id Tipo Vinho',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * Gets query for [[Vinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVinhos()
    {
        return $this->hasMany(Vinho::class, ['id_tipo_vinho' => 'id_tipo_vinho']);
    }

}
