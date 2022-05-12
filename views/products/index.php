<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Relatório';
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <div class="col-12 mt-4">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Digite o nome']) ?>
            </div>
            <div class="col-md-6 col-lg-4">
                <?php
                    foreach($productsType as $product){
                        $types[$product->type] = $product->type;
                    }
                ?>
                <?= $form->field($model, 'type')->dropdownList(['Tipos'=>$types], ['prompt' => 'Tipo do produto']) ?>
            </div>
            <div class="col-lg-4 form-row">
                <div class="col-5 col-lg-5">
                    <?php //$prices = ['50'=>'R$0-R$50', '50-100'=>'R$50-R$100', '100-200'=>'R$100-R$200', '200-400'=>'R$200-R$400', '400'=>'R$400+']; ?>
                    <?php //$form->field($model, 'price')->dropdownList(['Preços'=>$prices], ['prompt' => 'Preço']) ?>
                    <?= $form->field($model, 'price')->textInput(['placeholder' => 'Preço minímo']) ?>
                </div>
                <div class="col-5 col-lg-5 mt-4 pt-2 mt-lg-5 mt-xl-4">
                    <?= $form->field($model, 'priceTo')->textInput(['placeholder' => 'Preço máximo'])->label(false) ?>
                </div>
                <div class="col-2 col-lg-2 mt-4 pt-2">
                    <div class="form-group">
                        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <div class="col-12 mt-4">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'], //Show id column
                'name',
                'quantity',
                //'ean',
                [
                    'attribute' => 'price',
                    'label' => 'Preço do Produto',
                    'value' => function ($data) {
                       return "R$ " . $data->price;
                    },
                 ],
                //'type',
                //'details',
                /*[
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, $model, $key, $index, $column) {
                        return "Url::toRoute([$action, 'id' => $model->id])";
                    }
                ],*/
            ],
        ]); ?>
    </div>
</div>
