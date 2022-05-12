<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\Html;
use yii\widgets\LinkPager;

$this->title = 'Relatório';
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

                <h2>Relátorio</h2>

                <?php foreach ($products as $product): ?>
                    <li>
                        <?= Html::encode("{$product->name} ({$product->id})") ?>:
                        <?= $product->name ?>
                    </li>
                <?php endforeach; ?>
                </ul>

                <?= LinkPager::widget(['pagination' => $paginacao]) ?>
                </ul>

                <br>

                <?= Html::a('Click aqui &raquo;', ['/site/register'], ['class'=>'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>
