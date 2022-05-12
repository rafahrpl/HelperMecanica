<?php

namespace app\models;

use Yii;
use yii\base\Model;
/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property int $quantity
 * @property int $ean
 * @property int $price
 * @property string $type
 * @property string $otype
 * @property string $details
 */
/**
 * RegisterForm is the model behind the register form.
 */
class RegisterForm extends \yii\db\ActiveRecord
{
    public $name;
    public $quantity;
    public $ean;
    public $type;
    public $otype;
    public $price;
    public $details;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'quantity', 'ean', 'type', 'price', 'details'], 'required'],
            [['id', 'name', 'quantity', 'ean', 'type', 'price', 'details'], 'safe'],
            ['quantity', 'number', 'integerOnly'=>true, 'min' => 1, 'max' => 1000],
            ['ean', 'number', 'integerOnly'=>true, 'min' => 1000000000000, 'max' => 9999999999999],
            //['price', 'number', 'integerOnly'=>true, 'min' => 1, 'max' => 999999]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Nome do produto',
            'quantity' => 'Quantidade',
            'ean' => 'EAN',
            'type' => 'Tipo do produto',
            'otype' => 'Para outros tipos de produto cadastre um novo tipo',
            'price' => 'Preço do produto',
            'details' => 'Detalhes'
        ];
    }

}
