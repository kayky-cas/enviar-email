<?php
    header('Location: ../');
    $email = $_POST['email'];
    $caminho = "../usuarios/";
    $usuarios = scandir($caminho);
    if (in_array(md5($email).'.json', $usuarios)) {
        session_start();
        $_SESSION['acesso'] = false;
    }
    else{
        $userInfo = array(
            "email" => $email,
            "nome" => $_POST['nome'],
        );
        $arquivoUser = fopen($caminho.md5($email).'.json', 'a');
        fwrite($arquivoUser, json_encode($userInfo));
        fclose($arquivoUser);
        session_start();
        $_SESSION['acesso'] = true;

        // mail(
        //     $email,
        //     'Testando pra ver se vai!',
        //     'Meu deus é serio que foi?',
        //     "From: Kaykynho Gameplays"
        // );
    }
?>