<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property int $quantity
 * @property int $ean
 * @property float $price
 * @property string $type
 * @property string $details
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'quantity', 'ean', 'type', 'price', 'details'], 'required'],
            [['id', 'name', 'quantity', 'ean', 'type', 'price', 'priceTo', 'details'], 'safe'],
            ['quantity', 'number', 'integerOnly'=>true, 'min' => 1, 'max' => 99999],
            ['ean', 'number', 'integerOnly'=>true, 'min' => 1000000000000, 'max' => 9999999999999],
            ['price', 'number', 'integerOnly'=>false, 'max' => 999999],
            ['priceTo', 'number', 'integerOnly'=>false, 'max' => 999999]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'Nome do produto',
            'quantity' => 'Quantidade',
            'ean' => 'EAN',
            'type' => 'Tipo do produto',
            'otype' => 'Para outros tipos de produto cadastre um novo tipo',
            'price' => 'Preço do produto',
            'price' => 'Preço do produto',
            'details' => 'Detalhes'
        ];
    }
}
