<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Cadastro de produtos';
?>

<div class="products-form">
    
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="row">
        
            <div class="col-12 col-md-6">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'register-form']); ?>
                
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Digite o nome da peça']) ?>
                    <?= $form->field($model, 'quantity')->textInput(['number', 'placeholder' => 'Digite a quantidade']) ?>
                    <?= $form->field($model, 'ean')->textInput(['placeholder' => 'Digite o EAN']) ?>
                    <?= $form->field($model, 'price')->textInput(['placeholder' => 'Digite o preço']) ?>
            </div>
            <div class="col-12 col-md-6">
                    <?php $types = ['Embalagem'=>'Embalagem', 'Rotulagem'=>'Rotulagem', 'Limpeza'=>'Limpeza', 'Variedades'=>'Variedades', 'Outros'=>'Outro']; ?>
                    <?= $form->field($model, 'type')->dropdownList(['Tipos'=>$types], ['prompt' => '-Tipo do produto-']) ?>
                    <?=Html::input('text','products-otype','',['class'=>'form-control','placeholder' => 'Digite um novo tipo de produto'])?>
                    <?= $form->field($model, 'details')->textarea(['rows' => 5]) ?>
                    
                    <div class="form-group">
                        <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-lg btn-success p-2 px-4', 'name' => 'register-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <?php
    $this->registerJs(<<<JS
        const type = document.getElementById('products-type');
        const otypename = document.getElementsByName('products-otype');
        otypename[0].id = "products-otype";
        otypename[0].style.display = "none";
        type.addEventListener("change", function() {
            const otype = document.getElementById('products-otype');
            if(type.value == "Outros"){
                otype.style.display = "block";
                otype.setAttribute('required', '');
                type.setAttribute('type', 'text');
                otype.addEventListener("keyup", function() {
                    let string = otype.value.toLowerCase();
                    type.childNodes[3].children[4].value = string.charAt(0).toUpperCase() + string.slice(1);
                });
            } else {
                otype.style.display = "none";
                otype.removeAttribute("required");
            }
        });
    JS
    );
    ?>
</div>
