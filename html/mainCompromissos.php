<?php
    include "../php/session_recup.php";
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Compromissos - <?php echo $_SESSION['usuario']; ?></title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>
    <script type="text/javascript" src="../js/ajaxRequest.js">
    </script>
    <script type="text/javascript" src="../js/masks.js"></script>
    <script>
        window.onload = buscarCompromissos;
            function buscarCompromissos(){
                var ope = document.getElementById('op');
                var op= ope.options[ope.selectedIndex].value;
                var filtro = frmPesquisa.filtro.value;
                AjaxRequest();
                Ajax.onreadystatechange = mostrarCompromissos;
                Ajax.open('POST', '../php/tableCompromissos.php?op='+op+"&filtro="+filtro,true);	
                Ajax.send(null);
        }
        
        function mostrarCompromissos() {
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
                mask_data(frmPesquisa.filtro);
                frmPesquisa.filtro.setAttribute('maxlength','10');
            }else if(op==3){
                mask_hora(frmPesquisa.filtro);
                frmPesquisa.filtro.setAttribute('maxlength','5');
            }else if(op ==1){
                mas_nome(frmPesquisa.filtr);
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
                            <option value="2">Data</option>
                            <option value="3">Hora</option>
                            <option value="4">Assunto</option>
                        </select>
                        <input type="text" name="filtro" class="filtro" onkeyup="buscarCompromissos()" onkeypress="mask()" >
                    </form>
                    <a href="cadastroCompromisso.php"><img src="../img/addCompromisso.png" class="icon"></a>
                </div>
                <div class="boxTable" id="boxTable">
                    
                </div>
            </div>
        
        
        </div>
        
    
    
    
    
    
    </body>
</html>
