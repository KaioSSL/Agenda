<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Usuário</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <script type="text/javascript" src="../js/masks.js"></script>
        <script>
            function limpar(){
                cadastroUsuario.login.value="";
                cadastroUsuario.senha.value="";
                cadastroUsuario.email.value="";
                cadastroUsuario.nome.value="";
                cadastroUsuario.tel.value="";
            }
        </script>
    </head>
    <body>
        
        <div class="boxLogin">
            <a href="../html/login.php"><img src="../img/voltar.png" class="icon"></a><br>
            <h1>Cadastro </h1>
            <form name="cadastroUsuario" action="../php/cadastroUsuario.php">
                <spam>Nome:</spam> <input type="text" name="nome" onkeyup="mask_nome(cadastroUsuario.nome)" required><br>
                <spam>Telefone:</spam> <input type="text" id="tel" name="tel" maxlength="16" onkeypress="mask_tel(cadastroUsuario.tel)" onkeyup="isNumber(cadastroUsuario.tel)" placeholder="(xx) x xxxx-xxxx" required onblur="validarTel(cadastroUsuario.tel)"><br>
                <spam>Email:</spam> <input type="email" name="email" placeholder="xxx@xx.xxx" required><Br>
                <spam>Login:</spam> <input type="text" name="login" maxlength="12" required><br>
                <spam>Senha:</spam> <input type="password" name="senha" maxlength="6" required><br>
                <input type="submit" name="cadastrar" value="Cadastrar" class="buttonForm">
                <input type="button" value="Limpar" class="buttonForm" onclick="limpar()">
            </form>
        </div>
    </body>
</html>