<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\Html;
use yii\widgets\LinkPager;

$this->title = 'Relatório';
?>
<?php
/*echo PrintThis::widget([
	'htmlOptions' => [
		'id' => 'PrintThis',
		'btnClass' => 'btn btn-info',
		'btnId' => 'btnPrintThis',
		'btnText' => 'พิมพ์หน้านี้',
		'btnIcon' => 'fa fa-print'
	],
	'options' => [
		'debug' => false,
		'importCSS' => true,
		'importStyle' => false,
		'loadCSS' => "path/to/my.css",
		'pageTitle' => "",
		'removeInline' => false,
		'printDelay' => 333,
		'header' => null,
		'formValues' => true,
	]
]);*/
?>

<div class="site-index" id="PrintThis">

    <div class="body-content">

        <div class="row">
            <div class="col-12">

                <?php if (Yii::$app->session->hasFlash('registerFormSubmitted')): ?>

                <div class="alert alert-success alert-dismissible fade show">
                    <span>Produto cadastrado em nossa base com sucesso!</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php endif; ?>

                <br>

                <h2>Relatório</h2>

                <ul>
                    <li><label>Nome da peça: </label><?= $model->name; echo "as1"; ?></li>
                    <li><label>Quantidade: </label><?= $model->quantity ?></li>
                    <li><label>EAN: </label><?= $model->ean ?></li>
                    <li><label>Tipo do produto: </label><?= $model->type ?></li>
                    <li><label>Outros tipos do produto: </label><?= $model->otype ?></li>
                    <li><label>Preço do produto: </label><?= $model->price ?></li>
                    <li><label>Detalhes: </label><?= $model->details ?></li>
                    
                    <?php Yii::$app->formatter->locale = 'pt-BR'; ?>
                </ul>

                <br>

                <?= Html::a('Click aqui &raquo;', ['/site/register'], ['class'=>'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>
