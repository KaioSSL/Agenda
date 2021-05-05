<?php
    include "../php/session_recup.php";
    include "../php/ConnectionFactory.php";
    $_SQL = new ConnectionFactory();
    $_login = $_SESSION['usuario'];
    $_query = "SELECT * FROM usuario WHERE login = '$_login'";
    $_consulta = $_SQL->sql_query($_query);
    $_resultado = mysql_fetch_array($_consulta);
    $_nome = $_resultado['nome'];
    $_tel = $_resultado['tel'];
    $_email = $_resultado['email'];
    $_senha = $_resultado['senha'];
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Agenda Pessoal</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <script type="text/javascript" src="../js/masks.js"></script>
    </head>
    <body>
        <div class = "boxCentro">
            <?php
                include "../php/menu.php";
            ?>
            <div class="boxConteudo">
                <div class="contentBar">
                    <a href="../html/main.php"><img src="../img/voltar.png" class="icon"></a><br>
                </div>
                <div class="boxForm">
                    <h1>Perfil Usuario </h1>
                        <form name="mainUsuario" action="../php/alterarUsuario.php">
                            <spam>Nome:</spam> <input type="text" name="nome" onkeypress="mask_nome(cadastroUsuario.nome)" value="<?php echo $_nome;?>" ><br>
                            <spam>Telefone:</spam> <input type="text" id="tel" name="tel" maxlength="16" onkeypress="mask_tel(mainUsuario.tel)" placeholder="(xx) x xxxx-xxxx"  onblur="validarTel(mainUsuario.tel)" value="<?php echo $_tel;?>"><br>
                            <spam>Email:</spam> <input type="email" name="email" placeholder="xxx@xx.xxx"  value="<?php echo $_email;?>"><Br>
                            <spam>Login:</spam> <input type="text" name="login" maxlength="12"  value="<?php echo $_login;?>"><br>
                            <spam>Nova Senha:</spam> <input type="password" name="senhaNova" maxlength="6"  placeholder="Vazio para não alterar"><br>
                            <spam>Senha Atual:</spam> <input type="password" name="senhaAtual" maxlength="6" required placeholder="Informe para alterações"><br>
                            <input type="submit" name="alterar" value="Alterar" class="buttonForm">
                            <input type="submit" name="deletar" value="Deletar" class="buttonForm">
                        </form> 
                </div>
            
            </div>
        
        
        </div>
        
    
    
    
    
    
    </body>
</html>