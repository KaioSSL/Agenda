<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <script>
            function cadastrar(){
                location.href="cadastroUsuario.php";
            }
                
        </script>
    </head>
    <body>
        <div class="boxLogin">
            <div class="boxForm">
                <h1>Login</h1>
                <form name="login" action="../php/login.php">
                    <spam>Login:</spam> <input type="text" name="login" maxlength="12"><br>
                    <spam>Senha:</spam> <input type="password" name="senha" maxlength="6">
                    <input type="submit" value="Logar" class="buttonForm" name="logar">
                    <input type="button" value="Cadastrar" class="buttonForm" onclick="cadastrar()">
                </form>
            </div>
        </div>
    
    
    
    </body>
</html>