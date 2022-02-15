<html>
    <head>
        <title>Visualizar Registros</title>
    </head>

    <body>
        <h2>Autorize ou cancele a entrada de veículos</h2>
        <?php
            include_once 'funcoes.php';
            include_once 'funcoesBD.php';
            include_once 'conectaBD.php';
            include 'verificalogin.php';
            gerarView();
        ?>
    </body>
</html>