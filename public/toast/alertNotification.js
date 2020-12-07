/*Fin de Notificación mensaje toastr*/
function validaNumericos(event) {
    /*Valida solo números*/
    if(event.charCode >= 46 && event.charCode <= 57){
        return true;
    }else{
        return false;
    }
}

function validaLetras(event){
    if((event.charCode >= 65 && event.charCode <= 90)&& (event.charCode >= 97 && event.charCode <= 1227)){
        return true;
    }else{
        return false;
    }
}