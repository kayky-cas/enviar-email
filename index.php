
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EMAIL</title>
    </head>
    <body>
        <?php
            session_start();
            if (!isset($_SESSION['acesso'])) {
                echo'<form action="php/email.php" method="post">';
                echo '<input type="text" name="nome" id="nomeI">';
                echo '<input type="email" name="email" id="emailI">';
                echo '<input type="submit" name="enviar" id="enviarI">';
                echo '</form>';
            }
            else if ($_SESSION['acesso']){
                echo '<h1>Verifica lá teu email bb</h1>';
                session_destroy();
            }
            else {
                echo '<h1>Voce já foi cadastrado meu querido</h1>';
                session_destroy();
            }
        ?>
    </body>
</html>