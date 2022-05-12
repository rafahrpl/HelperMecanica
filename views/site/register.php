<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Cadastro de produtos';
?>

<div class="site-contact">
    
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="row">
        
            <div class="col-12 col-md-6">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'register-form']); ?>
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Digite o nome da peça']) ?>
                    <?= $form->field($model, 'quantity')->textInput(['number', 'placeholder' => 'Digite a quantidade']) ?>
                    <?= $form->field($model, 'ean')->textInput(['placeholder' => 'Digite o EAN']) ?>
                    <?= $form->field($model, 'price')->textInput(['number', 'placeholder' => 'Digite o preço']) ?>
            </div>
            <div class="col-12 col-md-6">
                    <?php $types = ['Embalagem'=>'Embalagem', 'Rotulagem'=>'Rotulagem', 'Limpeza'=>'Limpeza', 'Variedade'=>'Variedade', 'Outros'=>'Outro']; ?>
                    <?= $form->field($model, 'type')->dropdownList(['Tipos'=>$types], ['prompt' => '-Tipo do produto-']) ?>
                    <?= $form->field($model, 'otype')->textInput(['placeholder' => 'Digite um novo tipo de produto'])->label(false) ?>
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
        var type = document.getElementById('registerform-type');
        document.getElementById('registerform-otype').style.display = "none";
        type.addEventListener("change", function() {
            var otype = document.getElementById('registerform-otype')
            if(type.value == "Outros"){
                otype.style.display = "block";
                otype.setAttribute('required', '');
            } else {
                otype.style.display = "none";
                otype.removeAttribute("required");
            }
        });
    JS
    );
    ?>
</div>
