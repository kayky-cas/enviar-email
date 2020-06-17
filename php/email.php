<?php
    header('Location: ../');
    $email = $_POST['email'];
    $caminho = "../usuarios/";
    $usuarios = scandir($caminho);
    session_start();
    if (in_array(md5($email).'.json', $usuarios)) {
        $_SESSION['acesso'] = false;
        session_cache_expire(5);
    }
    else{
        $userInfo = array(
            "email" => $email,
            "nome" => $_POST['nome'],
        );
        $arquivoUser = fopen($caminho.md5($email).'.json', 'a');
        fwrite($arquivoUser, json_encode($userInfo));
        fclose($arquivoUser);
        $_SESSION['acesso'] = true;
        session_cache_expire(5);
        mail(
            $email,
            'Testando pra ver se vai!',
            'Meu deus é serio que foi?',
            "From: Kaykynho Gameplays"
        );
    }
?>