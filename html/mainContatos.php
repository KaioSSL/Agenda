<?php
    include "../php/session_recup.php";
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Contatos - <?php echo $_SESSION['usuario']; ?></title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>
    <script type="text/javascript" src="../js/ajaxRequest.js">
    </script>
    <script type="text/javascript" src="../js/masks.js"></script>
    <script>
        window.onload = buscarContatos;
            function buscarContatos(){
                var ope = document.getElementById('op');
                var op= ope.options[ope.selectedIndex].value;
                var filtro = frmPesquisa.filtro.value;
                AjaxRequest();
                
                Ajax.onreadystatechange = mostrarContatos;

                Ajax.open('POST', '../php/tableContatos.php?op='+op+"&filtro="+filtro,true);		

                Ajax.send(null);

            
        }
        
        function mostrarContatos() {
            if (Ajax.readyState == 4) {
                if (Ajax.status == 200) {
                    document.getElementById('boxTable').innerHTML = Ajax.responseText;
                    }			
                }
        }
        
        function mask(){
            var ope = document.getElementById('op');
            var op= ope.options[ope.selectedIndex].value;
            if(op==2){
                mask_tel(frmPesquisa.filtro);
                frmPesquisa.filtro.setAttribute('maxlength','16');
            }else if(op==1){
                mask_nome(frmPesquisa.filtro);
                frmPesquisa.filtro.setAttribute('maxlength','');
            }
        }
    </script>
    <body>
        <div class = "boxCentro">
            <?php
                include "../php/menu.php";
            ?>
            <div class="boxConteudo">
                <div class="contentBar">
                    <form name="frmPesquisa">
                        <select name="op" class="filtro" id="op">
                            <option value="1">Nome</option>
                            <option value="2">Telefone</option>
                            <option value="3">Email</option>
                        </select>
                        <input type="text" name="filtro" class="filtro" onkeyup="buscarContatos()" onkeypress="mask()" >
                    </form>
                    <a href="cadastroContato.php"><img src="../img/addContato.png" class="icon"></a>
                </div>
                <div class="boxTable" id="boxTable">
                </div>
            </div>
        
        
        </div>
        
    
    
    
    
    
    </body>
</html>
