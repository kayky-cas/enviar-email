<?php
    header('Location: ../');
    $email = $_POST['email'];
    $caminho = "../usuarios/";
    $nome = $_POST['nome'];
    $usuarios = scandir($caminho);
    if (in_array(md5($email).'.json', $usuarios)) {
        session_start();
        $_SESSION['acesso'] = false;
    }
    else{
        $userInfo = array(
            "email" => $email,
            "nome" => $nome,
        );
        $arquivoUser = fopen($caminho.md5($email).'.json', 'a');
        fwrite($arquivoUser, json_encode($userInfo));
        fclose($arquivoUser);
        session_start();
        $_SESSION['acesso'] = true;

        $conteudo = "<html><body><p>Olá ".$nome." se sinta honrado por poder usufruir da melhor experiência que um jogo eletronico possa oferecer!</p>";
        $conteudo .= "<a href = \"https://drive.google.com/uc?id=0By4O0cYL-BP1SHllMmg4UG03ZUk\"><img width = \"600\" src =\"https://4.bp.blogspot.com/-ygNevD84MmA/WiL3yDSKQVI/AAAAAAAAA0c/6LTO7owgMb4n3Iw-MmHv9wlCYlOodQZ_gCLcBGAs/s1600/maxresdefault.jpg\"></img></a><br><p>Link: https://drive.google.com/uc?id=0By4O0cYL-BP1SHllMmg4UG03ZUk</p></p></body></html>";
        mail(
            $email,
            'Mineirinho Ultra Adventure',
            $conteudo,
            "From: kayky@kayky.com.br\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n"
        );
    }
?>