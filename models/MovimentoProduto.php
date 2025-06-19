<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movimento_produto".
 *
 * @property int $id_movimento_produto
 * @property int|null $id_vinho
 * @property string $data_movimento
 * @property int $qtd_movimento
 * @property int $fl_movimento
 *
 * @property Vinho $vinho
 */
class MovimentoProduto extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movimento_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_vinho'], 'default', 'value' => null],
            [['id_vinho', 'qtd_movimento', 'fl_movimento'], 'integer'],
            [['data_movimento', 'qtd_movimento', 'fl_movimento'], 'required'],
            [['data_movimento'], 'safe'],
            [['id_vinho'], 'exist', 'skipOnError' => true, 'targetClass' => Vinho::class, 'targetAttribute' => ['id_vinho' => 'id_vinho']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_movimento_produto' => 'Id Movimento Produto',
            'id_vinho' => 'Id Vinho',
            'data_movimento' => 'Data Movimento',
            'qtd_movimento' => 'Qtd Movimento',
            'fl_movimento' => 'Fl Movimento',
        ];
    }

    /**
     * Gets query for [[Vinho]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVinho()
    {
        return $this->hasOne(Vinho::class, ['id_vinho' => 'id_vinho']);
    }

}
