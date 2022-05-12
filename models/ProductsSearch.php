<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `app\models\Products`.
 */
class ProductsSearch extends Products
{
    public $priceTo;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'type', 'price', 'priceTo', 'details'], 'safe'],
            [['quantity', 'ean'], 'integer'],
            ['price', 'number', 'integerOnly'=>false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Products::find();

        // add conditions that should always apply here
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'quantity' => $this->quantity,
            'ean' => $this->ean,
            'price' => $this->price,
        ]);
        
        if (empty($this->price)) {
            $this->price = '0';
        }
        if (empty($this->priceTo)) {
            $this->priceTo = '9999999999';
        }
        $query->orderBy('name');
            //Is absolute requiremente 'where' on top of 'andFilterWhere'
            $query->where('price between '.$this->price.' and '.$this->priceTo);    
            $query->andFilterWhere(['like', 'name', $this->name]);
            $query->andFilterWhere(['like', 'type', $this->type]);
            //$query->where('type like '.$this->type);
            //->andFilterWhere(['between', 'price', $this->price, $priceTo])
            

        return $dataProvider;
    }
}
