<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Helper oficina';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-5">Bem vindo!</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Helper oficina</h2>

                <p>Há 20 anos à helper vem crescendo e já é empresa é a terceira maior do Brasil, e a 12º na américa latina. Somos lideres em inovação na manutenção de carros, vans, caminhonetes e ônibus. Reconhecimento: Recebemos pela Brasil Diesel o prêmio Mecânico Cinza 2021.</p>
            </div>
            <div class="col-lg-4">
                <h2>Cadastro de produtos</h2>

                <p>Cadastre online produto agora mesmo, ele estará disponível automaticamente para todas as lojas.</p>

                <?= Html::a('Cadastre &raquo;', ['/products/create'], ['class'=>'btn btn-primary']) ?>
            </div>
            <div class="col-lg-4">
                <h2>Relátorio</h2>

                <p>Nosso sistema conta com relátorios gerados assim que o produto é cadastrado.</p>

                <img src="index.png" class="rounded mx-auto d-block img-fluid" alt="report">
            </div>
        </div>

    </div>
</div>
