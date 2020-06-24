var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var dados = JSON.parse(this.responseText);
        if (dados == 0) {            
            formDiv.innerHTML = '<form action="php/email.php" method="post"><input type="text" name="nome" id="nomeI" placeholder="Nome Completo" pattern = "[A-Z][a-záàãâéèêíìóòÔõúùû]+( [A-Z][a-záàãâéèêíìóòÔõúùû]+)+"><input type="email" name="email" id="emailI" placeholder="nome@exemplo.com"><input type="submit" name="enviar" id="enviarI" class="btn btn-light"></form>';
        }
        else if (dados == 1){
            formDiv.innerHTML = '<h1 class = "texto">Email enviado com sucesso!</h1>';
            formDiv.style.display = 'block';
            botao.style.display = 'none'; 
            texto.style.display = 'none';
        }  
        else if (dados == 2){
            formDiv.innerHTML = '<h1 class = "texto">Você já foi um dos escolhidos para desfrutar dessa maravilha!<br>(seu email já foi cadastrado)</h1>';
            formDiv.style.display = 'block';
            botao.style.display = 'none'; 
            texto.style.display = 'none';
        }         
    }
}
xhttp.open("GET", "php/checkSession.php", true);
xhttp.send();