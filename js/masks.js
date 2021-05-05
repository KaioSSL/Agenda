function mask_tel(endereco) {
    var valor = endereco.value;
    if(isDigit(valor.substr(valor.length-1))){    
        if (valor.length == 1){
            endereco.value = "(" + valor;
        }else if(valor.length == 3 ){
            endereco.value = valor + ") ";
        }else if(valor.length == 3 || valor.length == 6){
            endereco.value = valor + " ";
        }else if(valor.length ==11 ){
            endereco.value = valor + "-";
        }
    }else{
        endereco.value = valor.substring(0,valor.length-1);
    }
}

function mask_nome(endereco) {
    var valor = endereco.value;
    if(isDigit(valor.substr(valor.length-1))){
        endereco.value = valor.substring(0,valor.length-1);
    }
}
function mask_hora(endereco){
    var valor = endereco.value;
    if(valor.length == 2){
        endereco.value = valor + ":";
    }
}
function mask_cpf(endereco){
    var valor = endereco.value;
    if(valor.length ==3 || valor.length==7 || valor.length==11){
        if(valor.length==11){
            endereco.value = valor + "-";
        }else{
            endereco.value = valor + ".";
            }
        }
    }
function mask_data(endereco){
    var valor = endereco.value;
    if(valor.length==4 || valor.length==7 ){
        endereco.value = valor + "-";
    }
}
function mask_cep(endereco){
    var valor = endereco.value;
    if(valor.length==2){
        endereco.value = valor + ".";
    }else if(valor.length==6){
        endereco.value = valor + "-";
    }
}
function isNumber(endereco){
    var valor = endereco.value;
    if(!isDigit(valor.substr(valor.length-1))){
            endereco.value = valor.substring(0,valor.length-1) + " ";
        return false;
    }
    return true;
    
}
function isDigit(valor){
    var er = /^[0-9]*[.]*[)]*[,]{0,1}[0-9]*$/;
    return (er.test(valor));
}
function mask_placa(endereco){
    var valor = endereco.value;
    if(valor.length<=3){
        if(isDigit(valor.substr(valor.length-1))){
            endereco.value = valor.substring(0,valor.length-1);
        }
        if(valor.length==3){
        endereco.value = valor +"-";
        }
        
    }else if(valor.length > 4){
        if(!isDigit(valor.substr(valor.length-1))){
            endereco.value = valor.substring(0,valor.length-1);
        }
    }
}
function validarTel(endereco){
    var valor = endereco.value;
    if(valor.length!=16){
        document.getElementById('tel').focus();
    }
}