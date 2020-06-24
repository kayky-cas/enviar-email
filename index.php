
<!DOCTYPE html>
<html lang="pt">
    <head>
        <?php include 'php/html/head.php' ?>
    </head>
    <body>
        <div class ="centralizar">
            <div id="corpo">
                <h1 id ="titulo">TITULO</h1>
                <div id ="formDiv">
                    <?php
                        session_cache_expire(1);
                        session_start();
                        if (!isset($_SESSION['acesso'])) {
                            include 'php/html/form.php';
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
                </div>                
            </div>            
        </div>       
    </body>
    <script src="js/inputs.js"></script>
</html>