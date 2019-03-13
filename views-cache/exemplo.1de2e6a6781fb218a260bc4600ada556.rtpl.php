<?php if(!class_exists('Rain\Tpl')){exit;}?><style>
    .nameUser {
        display: flex;
        align-items: center;
        width: 100%;
        background-color: #0070c0;
        min-height: 200px;
    }

    .nameUser h1 {
        color: #fff;
        font-family: 'Open Sans', sans-serif;
        font-size: 30px;
        text-align: center;
        width: 100%;
    }

</style>

<div class="nameUser">
    <h1>Bem vindo <?php echo htmlspecialchars( $name, ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
</div>