
/*AQUI VAN VARIABLES GLOBALES POR SI SE ENCESITAN*/

/*----------------------------------------------*/

function mensaje(){
    alert("Hello! I am an alert box!!");
}

//funcion para dormir y darle chance a los ajax simultaneos
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}   


function validarFormulario(){
    var nom_proyecto = document.getElementById('nom_proyecto');
   // var cod_proyecto = document.getElementById('cod_proyecto');
    var cod_banner = document.getElementById('cod_banner');
    var cod_sia = document.getElementById('cod_sia');
    var ent_admi = document.getElementById('ent_admi');
    var c_fondo = document.getElementById('selectBox');

    if(c_fondo!=null){var fondo = c_fondo.options[c_fondo.selectedIndex].text;}
     
    var num_cuenta = document.getElementById('num_cuenta');
    var selectBox = document.getElementById('selectBox');
/*-------Variables fecha inicio--*/
    var dia = document.getElementById('fecha_1_2');
    var mes = document.getElementById('fecha_1_1');
    var anno = document.getElementById('fecha_1_3');
/*-------Variables fecha final---*/
    var diaf = document.getElementById('fecha_2_2');
    var mesf = document.getElementById('fecha_2_1');
    var annof = document.getElementById('fecha_2_3');
    //var miembros_space = document.getElementById('miembros_space'); 
/*----------------------------------------------------------------------------*/
/*----------------------------------------------------------------------------*/    
    if(nom_proyecto.value == ""){ //nombre de proyecto
        jAlert("Ingrese el nombre de proyecto", "Dato Requerido");
        nom_proyecto.setAttribute("style", "border-color:#ff8080");
        nom_proyecto.focus();
        window.scrollTo(0,0);
        return false;
    } else if(!validarNumLetraEspacio(nom_proyecto.value)){ //no contenga caracteres especiales
        jAlert("Ingrese solo letras o números", "Dato Requerido");
        nom_proyecto.setAttribute("style", "border-color:#ff8080");
        nom_proyecto.focus();
        window.scrollTo(0,0);
        return false;
    } else if(nom_proyecto.value.length > 255){ //tamano muy grande
        jAlert("Nombre del proyecto muy largo", "Dato Incorrecto");
        nom_proyecto.setAttribute("style", "border-color:#ff8080");
        nom_proyecto.focus();
        window.scrollTo(0,0);
        return false;
    }  else{
        nom_proyecto.setAttribute("style", "background-color:#ffffff");
    }
/*----------------------------------------------------------------------------*/
    if(cod_sia.value ==""){ //codigo SIA
        jAlert("Ingrese el código SIA", "Dato Requerido");
        cod_sia.setAttribute("style", "border-color:#ff8080");
        cod_sia.focus();
        window.scrollTo(0,0);
        return false;
    }else if(!validarNumLetra(cod_sia.value)){
        jAlert("Ingrese solo letras o números", "Dato Incorrecto");
        cod_sia.setAttribute("style", "border-color:#ff8080");
        cod_sia.focus();
        window.scrollTo(0,0);
        return false;
    }
     else if(cod_sia.value.length < 4){ //codigo muy pequeno
         jAlert("código sia muy pequeño", "Dato Incorrecto");
        cod_sia.setAttribute("style", "border-color:#ff8080");
        cod_sia.focus();
        window.scrollTo(0,0);
        return false;
    } else if(cod_sia.value.length > 9){ //codigo muy grande
        jAlert("código sia muy grande", "Dato Incorrecto");
        cod_sia.setAttribute("style", "border-color:#ff8080");
        cod_sia.focus();
        window.scrollTo(0,0);
        return false;
    } else{
        cod_sia.setAttribute("style", "border-color:#ffffff");
    }
/*----------------------------------------------------------------------------*/
    if(cod_banner.value ==""){ //codigo banner
        jAlert("Ingrese el código banner", "Dato Requerido");
        cod_banner.setAttribute("style", "border-color:#ff8080");
        cod_banner.focus();
        window.scrollTo(0,0);
        return false;
    } else if(cod_banner.value.length < 4){ //codigo muy pequeno
       jAlert("código banner muy pequeño", "Dato Incorrecto");
        cod_banner.setAttribute("style", "border-color:#ff8080");
        cod_banner.focus();
        window.scrollTo(0,0);
        return false;
    } else if(cod_banner.value.length > 10){ //codigo muy grande
        jAlert("código banner muy largo", "Dato Incorrecto");
        cod_banner.setAttribute("style", "border-color:#ff8080");
        cod_banner.focus();
        window.scrollTo(0,0);
        return false;
    } else if(!validarNumLetra(cod_banner.value)){
        jAlert("Ingrese solo letras", "Dato Requerido");
        cod_banner.setAttribute("style", "border-color:#ff8080");
        cod_banner.focus();
        window.scrollTo(0,0);
        return false;
    }else{
        cod_banner.setAttribute("style", "border-color:#ffffff");
        
    }
/*----------------------------------------------------------------------------*/
    if(ent_admi.value == ""){ //entidad administradora ->
        jAlert("Ingrese entidad admnistradora", "Dato Requerido");
        ent_admi.setAttribute("style", "border-color:#ff8080");
        ent_admi.focus();
        window.scrollTo(0,0);
        return false;   
    }  else if(!validacionSoloLetras(ent_admi.value)){
        jAlert("Ingrese solo letras", "Dato Requerido");
        ent_admi.setAttribute("style", "border-color:#ff8080");
        ent_admi.focus();
        window.scrollTo(0,0);
        return false;
    }else if(ent_admi.value.length > 100){
         jAlert("palabra muy grande", "Dato Incorrecto");
        ent_admi.setAttribute("style", "border-color:#ff8080");
        ent_admi.focus();
        window.scrollTo(0,0);
        return false; 
    } else{
        ent_admi.setAttribute("style", "border-color:#ffffff");
    }
/*----------------------------------------------------------------------------*/
    if(num_cuenta.value ==""){ //numero de cuenta
        jAlert("Ingrese número de cuenta", "Dato Requerido");
        num_cuenta.setAttribute("style", "border-color:#ff8080");
        num_cuenta.focus();
        window.scrollTo(0,200); //devuelve cerca del campo numero de cuenta
        return false; 
    } else if(!validarNumLetra(num_cuenta.value)){
        jAlert("Ingrese solo números o letras", "Dato Incorrecto");
        num_cuenta.setAttribute("style", "border-color:#ff8080");
        num_cuenta.focus();
        window.scrollTo(0,0);
        return false; 
    } else if(num_cuenta.value.length > 100){
        jAlert("Número de cuenta muy grande", "Dato Incorrecto");
        num_cuenta.setAttribute("style", "border-color:#ff8080");
        num_cuenta.focus();
        window.scrollTo(0,0);
        return false; 
    } else{
         num_cuenta.setAttribute("style", "border-color:#ffffff");
    }
/*----------------------------------------------------------------------------*/
    if(dia.value==""){
        jAlert("Ingrese día de fecha de ingreso de proyecto", "Dato Requerido");
        dia.setAttribute("style", "border-color:#ff8080");
        dia.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false; 
    } else if (dia.value < 1 || dia.value > 31){
        jAlert("Ingrese un rango de días correcto", "Dato Incorrecto");
        dia.setAttribute("style", "border-color:#ff8080");
        dia.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;    
    }else if(isNaN(dia.value)){
        jAlert("No se permiten letras en la fecha", "Dato Incorrecto");
        dia.setAttribute("style", "border-color:#ff8080");
        dia.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    } else{
        dia.setAttribute("style", "border-color:#ffffff");
    }
/*----------------------------------------------------------------------------*/
    if(mes.value==""){
        jAlert("Ingrese mes de fecha de ingreso de proyecto", "Dato Requerido");
        mes.setAttribute("style", "border-color:#ff8080");
        mes.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    }  else if(mes.value < 1 || mes.value > 12){
        jAlert("Ingrese un rango de mes correcto", "Dato Incorrecto");
        mes.setAttribute("style", "border-color:#ff8080");
        mes.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    }else if(isNaN(mes.value)){
        jAlert("No se permiten letras en la fecha", "Dato Incorrecto");
        mes.setAttribute("style", "border-color:#ff8080");
        mes.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    }  else{
        mes.setAttribute("style", "border-color:#ffffff");
    }
/*----------------------------------------------------------------------------*/
    if(anno.value==""){
        jAlert("Ingrese año de fecha de ingreso de proyecto", "Dato Requerido");
        anno.setAttribute("style", "border-color:#ff8080");
        anno.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    } else if(isNaN(anno.value)){
        jAlert("No se permiten letras en la fecha", "Dato Incorrecto");
        anno.setAttribute("style", "border-color:#ff8080");
        anno.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    }  else if(anno.value.length != 4){
        jAlert("Digite un año correcto", "Dato Incorrecto");
        anno.setAttribute("style", "border-color:#ff8080");
        anno.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    }else{
        anno.setAttribute("style", "border-color:#ffffff");
    }
/*----------------------------------------------------------------------------*/
    if(diaf.value==""){
        jAlert("Ingrese día de fecha de finalización de proyecto", "Dato Requerido");
        diaf.setAttribute("style", "border-color:#ff8080");
        diaf.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    } else if (diaf.value < 1 || diaf.value > 31){
        jAlert("Ingrese un rango de días correcto", "Dato Incorrecto");
        diaf.setAttribute("style", "border-color:#ff8080");
        diaf.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;    
    } else if(isNaN(diaf.value)){
        jAlert("No se permiten letras en la fecha", "Dato Incorrecto");
        diaf.setAttribute("style", "border-color:#ff8080");
        diaf.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    } else{
        diaf.setAttribute("style", "border-color:#ffffff");
    }
/*----------------------------------------------------------------------------*/
        if(mesf.value==""){
        jAlert("Ingrese mes de fecha de finalización de proyecto", "Dato Requerido");
        mesf.setAttribute("style", "border-color:#ff8080");
        mesf.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    } else if(mesf.value < 1 || mesf.value > 12){
        jAlert("Ingrese un rango de mes correcto", "Dato Incorrecto");
        mesf.setAttribute("style", "border-color:#ff8080");
        mesf.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    } else if(isNaN(mesf.value)){
        jAlert("No se permiten letras en la fecha", "Dato Incorrecto");
        mesf.setAttribute("style", "border-color:#ff8080");
        mesf.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    } else{
        mesf.setAttribute("style", "border-color:#ffffff");
    }
/*----------------------------------------------------------------------------*/
    if(annof.value==""){
        jAlert("Ingrese año de fecha de finalización de proyecto", "Dato Requerido");
        annof.setAttribute("style", "border-color:#ff8080");
        annof.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    } else if(isNaN(annof.value)){
        jAlert("No se permiten letras en la fecha", "Dato Incorrecto");
        annof.setAttribute("style", "border-color:#ff8080");
        annof.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    }  else if(annof.value.length != 4){
        jAlert("Digite un año correcto", "Dato Incorrecto");
        annof.setAttribute("style", "border-color:#ff8080");
        annof.focus();
        window.scrollTo(0,300); //devuelve cerca del campo numero de cuenta
        return false;
    } else{
        annof.setAttribute("style", "border-color:#ffffff");
    }
    if(!validarFecha()){return false;}
/*---------------------------------------------------------------------------*/
    if (c_fondo != null) {
        if (fondo == "[seleccione una opción]") {
            jAlert("Debe ingresar un tipo de fondo", "Dato Requerido");
            c_fondo.setAttribute("style", "border-color:#ff8080");
            c_fondo.focus();
            return false;
        } else { c_fondo.setAttribute("style", "border-color:#ffffff");}
    }
    return true;
}

function validarMiembro(){
    /*************************************************************/
    var TCedula= document.getElementById('TCedula');
    var miem_ced = document.getElementById('miem_ced');
    var miem_nombre = document.getElementById('miem_nombre');
    var miem_telefono = document.getElementById('miem_telefono');
    var miem_email = document.getElementById('miem_email');
    
    var c_tipo_tel = document.getElementById('tipo_tel');
    var tip_tel = c_tipo_tel.options[c_tipo_tel.selectedIndex].text;
    
    
    /*************************************************************/

        if (miem_ced.value == "") {
            jAlert("Ingrese una cédula de integrante", "Dato Requerido");
            miem_ced.setAttribute("style", "border-color:#ff8080");
            miem_ced.focus();
            return false;
        } else {
            miem_ced.setAttribute("style", "border-color:#ffffff");
        }

        if (TCedula.value == "Nacional") {
            if (isNaN(miem_ced.value)) {
                jAlert("No se permiten letras en la cédula", "Dato Incorrecto");
                miem_ced.setAttribute("style", "border-color:#ff8080");
                miem_ced.focus();
                window.scrollTo(0, 300); //devuelve cerca del campo numero de cuenta
                return false;
            }
        } else if (TCedula.value == "Extranjero") {
            if (!validarNumLetra(miem_ced.value)) {
                jAlert("Ingrese solo números o letras", "Dato Incorrecto");
                miem_ced.setAttribute("style", "border-color:#ff8080");
                miem_ced.focus();
                window.scrollTo(0, 0);
                return false;
            }
        }


        if (TCedula.value == "Nacional") {
            if (miem_ced.value.length > 9) {
                jAlert("No se permiten más de 9 dígitos en la cédula", "Dato Incorrecto");
                miem_ced.setAttribute("style", "border-color:#ff8080");
                miem_ced.focus();
                window.scrollTo(0, 300); //devuelve cerca del campo numero de cuenta
                return false;
            }
        } else if (TCedula.value == "Extranjero") {
            if (miem_ced.value.length > 12) {
                jAlert("No se permiten más de 12 dígitos en la cédula", "Dato Incorrecto");
                miem_ced.setAttribute("style", "border-color:#ff8080");
                miem_ced.focus();
                window.scrollTo(0, 0);
                return false;
            }
        }

        /*---------------------------------------------------------------------------------*/
        if (miem_nombre.value == "") {
            jAlert("Ingrese un nombre de integrante", "Dato Requerido");
            miem_nombre.setAttribute("style", "border-color:#ff8080");
            miem_nombre.focus();
            return false;
        } else if (!validarNumLetraEspacio(miem_nombre.value)) {
            jAlert("El nombre no debe tener caracteres especiales", "Dato Incorrecto");
            miem_nombre.setAttribute("style", "border-color:#ff8080");
            miem_nombre.focus();
            return false;
        } else {
            miem_nombre.setAttribute("style", "border-color:#ffffff");
        }

        if (miem_telefono.value == "") {
            jAlert("Debe ingresar un número de teléfono", "Dato Requerido");
            miem_telefono.setAttribute("style", "border-color:#ff8080");
            miem_telefono.focus();
            return false;
        } else {
            miem_telefono.setAttribute("style", "border-color:#ffffff");
        }

        if (tip_tel == "[Seleccione]") {
            jAlert('Especifique el tipo de teléfono', 'Error');
            c_tipo_tel.setAttribute("style", "border-color:#ff8080");
            c_tipo_tel.focus();
            return false;
        } else {
            c_tipo_tel.setAttribute("style", "border-color:#ffffff");
        }

        if (miem_email.value == "") {
            jAlert("debe ingresar un correo electrónico", "Dato Requerido");
            miem_email.setAttribute("style", "border-color:#ff8080");
            miem_email.focus();
            return false;
        } else if (!validarCorreo(miem_email.value)) {
            jAlert("Debe escribir el correo correctamente", "Dato Incorrecto");
            miem_email.setAttribute("style", "border-color:#ff8080");
            miem_email.focus();
            return false;
        } else {
            miem_email.setAttribute("style", "border-color:#ffffff");
        }
        return true;
}

 function noMasMiembros() {
    var miem_ced = document.getElementById('miem_ced');
    var miem_nombre = document.getElementById('miem_nombre');
    var miem_telefono = document.getElementById('miem_telefono');
    var miem_email = document.getElementById('miem_email');
    var res = 0;
    //res : 0 = todos los campos vacios
    //res : 1 = Hay algun campo con informacion
    
    return (miem_ced.value == "" && miem_nombre.value == "" && miem_telefono.value == "" && miem_email.value == "") ? res :  res = 1 ;
 }

function validarFecha() {
    /*-------Variables fecha inicio------------------------------------*/
    var dia = parseInt(document.getElementById('fecha_1_2').value);
    var mes = parseInt(document.getElementById('fecha_1_1').value);
    var anno = parseInt(document.getElementById('fecha_1_3').value);
    /*-------Variables fecha final-----------------------------------------*/
    var diaf = parseInt(document.getElementById('fecha_2_2').value);
    var mesf = parseInt(document.getElementById('fecha_2_1').value);
    var annof = parseInt(document.getElementById('fecha_2_3').value);
    /*-------------------------------------------------------------------*/

    var c_dia = document.getElementById('fecha_1_2');
    var c_mes = document.getElementById('fecha_1_1');
    var c_anno = document.getElementById('fecha_1_3');

    var c_diaf = document.getElementById('fecha_2_2');
    var c_mesf = document.getElementById('fecha_2_1');
    var c_annof = document.getElementById('fecha_2_3');
    
    var inicio = new Date(anno,mes,dia);
    var fin = new Date(annof,mesf,diaf);
    
    if(fin > inicio){
        c_dia.setAttribute("style", "border-color:#00b300");
        c_diaf.setAttribute("style", "border-color:#00b300");
        c_mes.setAttribute("style", "border-color:#00b300");
        c_mesf.setAttribute("style", "border-color:#00b300");
        c_anno.setAttribute("style", "border-color:#00b300");
        c_annof.setAttribute("style", "border-color:#00b300");
        return true;
    } else{
        c_dia.setAttribute("style", "border-color:#ff8080");
        c_diaf.setAttribute("style", "border-color:#ff8080");
        c_mes.setAttribute("style", "border-color:#ff8080");
        c_mesf.setAttribute("style", "border-color:#ff8080");
        c_anno.setAttribute("style", "border-color:#ff8080");
        c_annof.setAttribute("style", "border-color:#ff8080");
        jAlert('Fecha incorrecta', 'Error');
        return false;
    }
}



/*validaNumLetra valida que no hayan caracteres raros al principio, en medio
 * o al final del string, tambien valida que los nombres no empeizen con numero
 * y valida espacios en blanco.*/
function validarNumLetraEspacio(texto){ 
    if(/^[\@\0-9]|[^A-Za-zÑñáéíóúÁÉÍÓÚ\:\-\_\,\.\()0-9\s]|[\.]$/.test(texto)){return false;}
    else {return true;}
}

function validarCorreo(texto){
    if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(texto)){return false;}
    else {return true;}
}

function validarNumLetra(texto){
    if(/^[\.]|[^A-Za-zÑñáéíóúÁÉÍÓÚ0-9\-\_\s]|[\.]$/.test(texto)){ return false;}
    else{return true;}
}

/*Esta validacion solo acepta que ingresen palabras, mas no numeros o caracateres*/
function validacionSoloLetras(texto){
    /*si el texto contiene caracteres que no son los que estan dentro de []*/
    if(/^[\@\)0-9]|[^A-Za-zÑñáéíóúÁÉÍÓÚ\:\-\.\()\s]|[\.]$/.test(texto)){ 
        return false;
    }else{return true;}
}


function new_fondo(){
    var fondo = document.getElementById('input_tip_fondo').value;
    var cod_sia = document.getElementById('cod_sia').value;
    if(fondo == ""){jAlert("No existen fondos para almacenar");}
    else {
    var ajax = NuevoAjax();
    var _values_send =
            'input_tip_fondo=' + fondo +'&cod_sia='+ cod_sia;
    var _URL_ = "mod/admin/proyecto/ajax_new_tipo_fondo.php?";
     ajax.open("GET", _URL_ + _values_send, true);
     ajax.onreadystatechange = function() {
            if (ajax.readyState == 1) {
                //Nada
            } else if (ajax.readyState == 4) {
                var response = ajax.responseText;
                //alert(response); //DEBUG
                if (response == 0) {
                    agregarFondo();
                } else if (response == 1 || response == 2) {
                    jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS", "Error");
                } else if (response == 3) {
                    jAlert("El Fondo ya existe.\n Consulte a la USTDS", "Fondo ya existe");

                    jAlert("Proyecto añadido con éxito", "Éxito");
                } else if (response == 1 || response == 2) {
                    jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS", "Error");
                } else if (response == 3) {
                    jAlert("El Proyecto ya existe.\n Consulte a la USTDS", "Usuario ya existe");
                } else {
                    jAlert("Ocurrio un error inesperado.\n Consulte a la USTDS", "Error inesperado");
                }
            }
        };
        ajax.send(null);
    }
}

/** 
 * Se preparan los datos y se envian para Añadir el nuevo proyecto a la base de datos,
 * si la respuesta es 0 se redirecciona al formulario de Agregar integrantes del proyecto
 * */

function new_proy() {   
    var fondo = jQuery('#selectBox option:selected').text();
    var nom_proyecto = document.getElementById('nom_proyecto').value;
    var cod_banner = document.getElementById('cod_banner').value;
    var cod_sia = document.getElementById('cod_sia').value;
    var ent_admi = document.getElementById('ent_admi').value;
    var num_cuenta = document.getElementById('num_cuenta').value;
    var dia_ini=document.getElementById('fecha_1_2').value;
    var mes_ini=document.getElementById('fecha_1_1').value;
    var ano_ini= document.getElementById('fecha_1_3').value;
    var fech_ini=ano_ini + '-' + mes_ini + '-' + dia_ini;
    var dia_fin=document.getElementById('fecha_2_2').value;
    var mes_fin= document.getElementById('fecha_2_1').value;
    var ano_fin=document.getElementById('fecha_2_3').value;
    var fech_fin=ano_fin + '-' + mes_fin + '-' + dia_fin;
	var estado = document.getElementById('Estados').value;
        //Preparacion  llamada AJAX 
        var ajax = NuevoAjax();
        var _values_send =
                'nom_proyecto=' + nom_proyecto +
                '&cod_banner=' + cod_banner +
                '&cod_sia=' + cod_sia  +
                '&ent_admi='+ ent_admi +
                '&num_cuenta='+ num_cuenta +
                '&fech_ini='+ fech_ini +
                '&fech_fin=' + fech_fin +
                '&input_tip_fondo=' + fondo +
		'&Estados=' + estado;
        var _URL_ = "mod/admin/proyecto/ajax_new_proy.php?";
        //alert(_URL_ + _values_send); //DEBUG
        ajax.open("GET", _URL_ + _values_send, true);
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 1) {
                //Nada
            } else if (ajax.readyState == 4) {
                var response = ajax.responseText;
                //alert(response); //DEBUG
                if (response == 0) {
                    jAlert("Proyecto añadido con éxito", "Éxito");
                    OpcionMenu('mod/admin/proyecto/agregar_integrantes.php?','cod_sia=' + cod_sia);
                } else if (response == 1 || response == 2) {
                    jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS", "Error");
                } else if (response == 3) {
                    jAlert("El Proyecto ya existe.\n Consulte a la USTDS", "Usuario ya existe");
                } else {
                    jAlert("Ocurrio un error inesperado.\n Consulte a la USTDS", "Error inesperado");
                }
            }
        };

        ajax.send(null); //envia la informacion al PHP
    }
    
    /**
     * Se encarga de enviar la información para la Actualización de la información de proyectos
    * si la respuesta es 0 redirecciona al listado de proyectos
    * */

    function update_proy(){
    if (validarFormulario()) {
        //Obtener Valores
    var nom_proyecto = document.getElementById('nom_proyecto').value;
    var cod_banner = document.getElementById('cod_banner').value;
    var cod_sia = document.getElementById('cod_sia').value;
    var ent_admi = document.getElementById('ent_admi').value;
    var num_cuenta = document.getElementById('num_cuenta').value;
    var prorroga = document.getElementById('prorroga').value;
    var dia_ini=document.getElementById('fecha_1_2').value;
    var mes_ini=document.getElementById('fecha_1_1').value;
    var ano_ini= document.getElementById('fecha_1_3').value;
    var fech_ini=ano_ini + '-' + mes_ini + '-' + dia_ini;
    var dia_fin=document.getElementById('fecha_2_2').value;
    var mes_fin= document.getElementById('fecha_2_1').value;
    var ano_fin=document.getElementById('fecha_2_3').value;
    var fech_fin=ano_fin + '-' + mes_fin + '-' + dia_fin;
    var tipo = document.getElementById('tip_fondo').value;
    var estado= document.getElementById('Estados').value;
        //Preparacion  llamada AJAX 
        var ajax = NuevoAjax();
        var _values_send =
                 'nom_proyecto=' + nom_proyecto +
                '&cod_banner=' + cod_banner +
                '&cod_sia=' + cod_sia  +
                '&ent_admi='+ ent_admi +
                '&num_cuenta='+ num_cuenta +
                '&fech_ini='+ fech_ini +
                '&fech_fin=' + fech_fin +
                '&tipo=' + tipo +
                '&Estado=' + estado +
                '&prorroga=' + prorroga;
        var _URL_ = "mod/admin/proyecto/ajax_upd_proy.php?";
        //alert(_URL_ + _values_send); //DEBUG
        ajax.open("GET", _URL_ + _values_send, true);
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 1) {
                //Nada
            } else if (ajax.readyState == 4) {
                var response = ajax.responseText;
                //alert(response); //DEBUG
                if (response == 0) {
                    jAlert("Proyecto actualizado con éxito", "Éxito");
                    OpcionMenu('mod/admin/proyecto/listar_proyecto.php?', '');
                } else if (response == 1 || response == 2) {
                    jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS");
                } else {
                    jAlert("Ocurrio un error inesperado.\n Consulte a la USTDS", "Error inesperado");
                }
            }
        };
        ajax.send(null);
    }
}
function uprecordatorio(){
        //Obtener Valores
    var nom_proyecto = document.getElementById('cod_sia').value;
    var subject = document.getElementById('nom_proyecto').value;
    var email = document.getElementById('ent_admi').value;
    var body = document.getElementById('cod_banner').value;
    var dia_ini=document.getElementById('fecha_1_2').value;
    var mes_ini=document.getElementById('fecha_1_1').value;
    var ano_ini= document.getElementById('fecha_1_3').value;
    var fech_ini=ano_ini + '-' + mes_ini + '-' + dia_ini;
        //Preparacion  llamada AJAX 
        var ajax = NuevoAjax();
        var _values_send =
                 'nom_proyecto=' + nom_proyecto +
                '&subject=' + subject +
                '&email=' + email  +
                '&body='+ body +
                '&fech_ini='+ fech_ini ;
        var _URL_ = "mod/admin/proyecto/ajax_upd_recor.php?";
        //alert(_URL_ + _values_send); //DEBUG
        ajax.open("GET", _URL_ + _values_send, true);
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 1) {
                //Nada
            } else if (ajax.readyState == 4) {
                var response = ajax.responseText;
                //alert(response); //DEBUG
                if (response == 0) {
                    jAlert("Recordatorio actualizado con éxito", "Éxito");
                    OpcionMenu('mod/admin/proyecto/listar_proyecto.php?', '');
                } else if (response == 1 || response == 2) {
                    jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS");
                } else {
                    jAlert("Ocurrio un error inesperado.\n Consulte a la USTDS", "Error inesperado");
                }
            }
        };
        ajax.send(null);
    
}
    /**Se envian los datos con la información para que el proyecto pueda ser eliminado de la base
    *de datos
    * @param {cod_sia} cod_sia envia el codigo sia que se desea eliminar
    * si la respuesta es 0 redirecciona al listado de proyectos
    * */

function delete_proy(cod_sia) {
    var page = document.getElementById('container');
    page.innerHTML = cargando;
    var ajax = NuevoAjax();
    //Preparacion  llamada AJAX
    var _values_send = 'cod_sia=' + cod_sia;
    var _URL_ = "mod/admin/proyecto/ajax_del_proy.php?";
    //alert(_URL_ + _values_send); //DEBUG
    ajax.open("GET", _URL_+_values_send, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 1) {
            page.innerHTML = cargando;
        } else if (ajax.readyState == 4) {
            var response = ajax.responseText;
            //alert(response); //DEBUG
            if (response == 0) {
                OpcionMenu('mod/admin/proyecto/listar_proyecto.php?', '');
            } else if (response == 1 || response == 2) {
                jAlert('Ha ocurrido un error en la Base de Datos Intentelo Nuevamente\n Si el problema continua comuniquese con la USTDS', 'Error');
                OpcionMenu('mod/admin.proyecto/listar_proyecto.php?', '');
            } else {
                jAlert('Ha ocurrido un error inesperado intentelo más tarde!', 'Error');
                OpcionMenu('mod/admin/proyecto/listar_proyecto.php?', '');
            }
        }
    };
    page.innerHTML = '';
    ajax.send(null);
}
function delete_record(cod_sia) {
    var page = document.getElementById('container');
    page.innerHTML = cargando;
    var ajax = NuevoAjax();
    //Preparacion  llamada AJAX
    var _values_send = 'Nom_Proy=' + cod_sia;
    var _URL_ = "mod/admin/proyecto/ajax_del_recor.php?";
    //alert(_URL_ + _values_send); //DEBUG
    ajax.open("GET", _URL_+_values_send, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 1) {
            page.innerHTML = cargando;
        } else if (ajax.readyState == 4) {
            var response = ajax.responseText;
            //alert(response); //DEBUG
            if (response == 0) {
                OpcionMenu('mod/admin/proyecto/Recordatorios.php?', '');
            } else if (response == 1 || response == 2) {
                jAlert('Ha ocurrido un error en la Base de Datos Intentelo Nuevamente\n Si el problema continua comuniquese con la USTDS', 'Error');
                OpcionMenu('mod/admin.proyecto/listar_proyecto.php?', '');
            } else {
                jAlert('Ha ocurrido un error inesperado intentelo más tarde!', 'Error');
                OpcionMenu('mod/admin/users/list_user.php?', '');
            }
        }
    };
    page.innerHTML = '';
    ajax.send(null);
}

/** 
 * Se preparan los datos y se envian para Añadir el nuevo integrante a la base de datos,
 * si la respuesta es 0 se limpian todos los campos del formulario para que el usuario, si lo desea, pueda
 * agregar otro integrante
 * */
        
    function new_member(){
    var miem_cod_sia = document.getElementById('miem_cod_sia').value; 
    var miem_ced = document.getElementById('miem_ced').value;
    var miem_nombre = document.getElementById('miem_nombre').value;
    var miem_telefono = document.getElementById('miem_telefono').value;
    var id_tipo_tel = document.getElementById('tipo_tel').value;
    var miem_email = document.getElementById('miem_email').value;
    var t_miem = document.getElementById('TMiembro').value;
    var jornada = document.getElementById('Jornada').value;

    
    var ajax = NuevoAjax();
    var _URL_ = "mod/admin/proyecto/ajax_new_integrante.php?";
    var _values_send = 
            'miem_ced=' + miem_ced +
            '&miem_nombre='+ miem_nombre +
            '&miem_telefono='+ miem_telefono +
            '&tipo_tel='+ id_tipo_tel +
            '&miem_email='+ miem_email +
            '&miem_cod_sia='+ miem_cod_sia +
            '&t_miem=' + t_miem +
            '&miem_jornada=' + jornada;
    
    ajax.open("GET", _URL_ + _values_send, true);
    
    ajax.onreadystatechange = function() {
            if (ajax.readyState == 1) {
                //Nada
            } else if (ajax.readyState == 4) {
                var response = ajax.responseText;
                //alert(response); //DEBUG
                if (response == 0) {
                    jAlert("Miembro agregado con éxito","Éxito");
                    limpiarCampoMiembro();
                } else if (response == 1 || response == 2) {
                    jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS", "Error");
                } else if (response == 3) {
                    jAlert("El miembro ya existe.\n Consulte a la USTDS", "Usuario ya existe");
                } else {
                    jAlert("Ocurrio un error inesperado.\n Consulte a la USTDS", "Error inesperado");
                }
            }
        };
        ajax.send(null); //envia la informacion al PHP 
    }
    
    /**Se busca el miembro en la tabla de integrantes, y si existe, se asocia a un proyecto**/
    function reuse_member(){
    var miem_cod_sia = document.getElementById('miem_cod_sia').value; 
    var miem_ced = document.getElementById('miem_ced').value;
    var t_miem = document.getElementById('TMiembro').value;
    var jornada = document.getElementById('Jornada').value;
    
    
    var ajax = NuevoAjax();
    var _URL_ = "mod/admin/proyecto/ajax_reuse_member.php?";
    var _values_send = 
            'miem_ced=' + miem_ced +
            '&miem_cod_sia='+ miem_cod_sia +
            '&t_miem=' + t_miem +
            '&miem_jornada=' + jornada;
    
    ajax.open("GET", _URL_ + _values_send, true);
    
    ajax.onreadystatechange = function() {
            if (ajax.readyState == 1) {
                //Nada
            } else if (ajax.readyState == 4) {
                var response = ajax.responseText;
                //alert(response); //DEBUG
                if (response == 0) {
                    jAlert("Miembro asignado","Éxito");
                    limpiarCampoMiembro();
                } else if (response == 1 || response == 2) {
                    jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS", "Error");
                } else if (response == 3) {
                    jAlert("El miembro ya existe en este proyecto.\n Consulte a la USTDS", "Usuario ya existe");
                } else {
                    jAlert("Ocurrio un error inesperado.\n Consulte a la USTDS", "Error inesperado");
                }
            }
        };
        ajax.send(null); //envia la informacion al PHP
    }

    /**Se envian los datos con la información para que el integrante pueda ser eliminado de la base
    *de datos
    * @param {ced_id} ced_id se envia el numero de cedula de la persona que se desea eliminar
    *  @param {cod_sia} cod_sia se envia el codigo sia relacionado a ese integrante del proyecto
    * si la respuesta es 0 redirecciona al listado de miembros
    *este ajax elimina en la tabla intermedia de miembros asociados a un proyecto*/
    function delete_member(ced_id,cod_sia){
        var ajax = NuevoAjax();
         var _values_send = 'ced_id='+ ced_id +
                            '&cod_sia='+cod_sia;
         var _URL_ = "mod/admin/proyecto/ajax_del_integrante.php?";
         ajax.open("GET", _URL_ + _values_send, true);
         ajax.onreadystatechange = function() {
        if (ajax.readyState == 1) {
            page.innerHTML = cargando;
        } else if (ajax.readyState == 4) {
            var response = ajax.responseText;
            //alert(response); //DEBUG
            if (response == 0) {
                jAlert('El miembro se ha eliminado correctamente!', 'Éxito');
                OpcionMenu('mod/admin/proyecto/listar_integrantes.php?', '');
            } else if (response == 1 || response == 2) {
                jAlert('Ha ocurrido un error en la Base de Datos Intentelo Nuevamente\n Si el problema continua comuniquese con la USTDS', 'Error');
                OpcionMenu('mod/admin/users/list_user.php?', '');
            } else {
                jAlert('Ha ocurrido un error inesperado intentelo más tarde!', 'Error');
                OpcionMenu('mod/admin/users/list_user.php?', '');
            }
        }
    };
    ajax.send(null);
    }
    /*Este ajax elimina a los integrantes que hayan sido registrados previamente,
     * si este ajax se ejecuta, el miembro quedara eliminado de la BD, y sera 
     * eliminado tambien de la tabla intermedia*/
    
    function delete_absolute_member(ced_id) {
        var ajax = NuevoAjax();
        var _values_send = 'ced_id='+ ced_id;
         var _URL_ = "mod/admin/proyecto/ajax_del_integrante_total.php?";
         ajax.open("GET", _URL_ + _values_send, true);
         ajax.onreadystatechange = function() {
        if (ajax.readyState == 1) {
            page.innerHTML = cargando;
        } else if (ajax.readyState == 4) {
            var response = ajax.responseText;
            //alert(response); //DEBUG
            if (response == 0) {
                jAlert('El miembro se ha eliminado correctamente!', 'Éxito');
                OpcionMenu('mod/admin/proyecto/listar_integrantes_totales.php?', '');
            } else if (response == 1 || response == 2) {
                jAlert('Ha ocurrido un error en la Base de Datos Intentelo Nuevamente\n Si el problema continua comuniquese con la USTDS', 'Error');
                OpcionMenu('mod/admin/users/list_user.php?', '');
            } else {
                jAlert('Ha ocurrido un error inesperado intentelo más tarde!', 'Error');
                OpcionMenu('mod/admin/users/list_user.php?', '');
            }
        }
    };
    ajax.send(null);      
    }






    /**Se envian los datos con la información para que el usuario pueda eliminar 
     * un pdf
    * @param {id} id se id del archvivo pdf que desea eliminar
    *  @param {cod} cod se envia el codigo sia relacionado al archivo pdf
    *  @param {nom} nom se nombre del archivo pdf
    * si la respuesta es 0 redirecciona al listado de miembros
    * */
    function delete_pdf(id,cod,nom){
        var ajax = NuevoAjax();
         var _values_send = 'id='+ id +
                            '&cod='+cod+
                            '&nom='+nom;
         var _URL_ = "mod/admin/proyecto/ajax_eliminar_pdf.php?";
         ajax.open("GET", _URL_ + _values_send, true);
         ajax.onreadystatechange = function() {
        if (ajax.readyState == 1) {
            page.innerHTML = cargando;
        } else if (ajax.readyState == 4) {
            var response = ajax.responseText;
            //alert(response); //DEBUG
            if (response == 0) {
                jAlert('El archivo se ha eliminado correctamente!', 'Éxito');
                OpcionMenu('mod/admin/proyecto/view_proyect.php?', 'cod_sia=' + cod + '&view_mode=1');
            } else if (response == 1 || response == 2) {
                jAlert('Ha ocurrido un error en la Base de Datos Intentelo Nuevamente\n Si el problema continua comuniquese con la USTDS', 'Error'); 
            } else {
                jAlert('Ha ocurrido un error inesperado intentelo más tarde!', 'Error');
               
            }
        }
    };
    ajax.send(null);
    }


    /**
     * Se encarga de enviar la información para la Actualización de la información de miembros de proyecto
    * si la respuesta es 0 redirecciona al listado de integrantes
    * */
    
    function update_absolute_member(){
        var ced_miem = document.getElementById('ced_miem').value;
        var nom_miem = document.getElementById('nom_miem').value; 
        var tel_miem = document.getElementById('tel_miem').value;
        var id_tipo_tel = document.getElementById('tipo_tel').value;
        var email_miem = document.getElementById('email_miem').value;
//        var t_miem= document.getElementById('TMiembro').value;
//        var jornada= document.getElementById('Jornada').value;
        
        var ajax = NuevoAjax();
         var _URL_ = "mod/admin/proyecto/ajax_upd_integrante_total.php?";
    var _values_send = 
            'ced_miem=' + ced_miem +
            '&nom_miem='+ nom_miem +
            '&tel_miem='+ tel_miem +
            '&tipo_tel=' + id_tipo_tel +
            '&email_miem='+ email_miem;
//            '&t_miem=' + t_miem +
//            '&miem_jornada='+ jornada;
    
    ajax.open("GET", _URL_ + _values_send, true);
    ajax.onreadystatechange = function() {
            if (ajax.readyState == 1) {
                //Nada
            } else if (ajax.readyState == 4) {
                var response = ajax.responseText;
                if (response == 0) {
                    OpcionMenu('mod/admin/proyecto/listar_integrantes_totales.php?','');
                } else if (response == 1 || response == 2) {
                    jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS", "Error");
                } else if (response == 3) {
                    jAlert("El miembro ya existe.\n Consulte a la USTDS", "Usuario ya existe");
                } else {
                    jAlert("Ocurrio un error inesperado.\n Consulte a la USTDS", "Error inesperado");
                }
            }
        };
        ajax.send(null); //envia la informacion al PHP 
    }
    
    
    function update_member() {
       var ced_miem = document.getElementById('ced_miem').value;
       var tm = document.getElementById('TMiembro');
       var t_miem= tm.options[tm.selectedIndex].value;
       var j = document.getElementById('Jornada');
       var jornada= j.options[j.selectedIndex].value;
       var ajax = NuevoAjax();
         var _URL_ = "mod/admin/proyecto/ajax_upd_integrante.php?";
    var _values_send = 
            'ced_miem=' + ced_miem +
            '&t_miem=' + t_miem +
            '&miem_jornada='+ jornada;
    
    ajax.open("GET", _URL_ + _values_send, true);
    ajax.onreadystatechange = function() {
            if (ajax.readyState == 1) {
                //Nada
            } else if (ajax.readyState == 4) {
                var response = ajax.responseText;
                if (response == 0) {
                    OpcionMenu('mod/admin/proyecto/listar_integrantes.php?','');
                } else if (response == 1 || response == 2) {
                    jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS", "Error");
                } else if (response == 3) {
                    jAlert("El miembro ya existe.\n Consulte a la USTDS", "Usuario ya existe");
                } else {
                    jAlert("Ocurrio un error inesperado.\n Consulte a la USTDS", "Error inesperado");
                }
            }
        };
        ajax.send(null); //envia la informacion al PHP 
    }
    
    function get_fondos(){
        var ajax = NuevoAjax();
        var _URL_ = "mod/admin/proyecto/ajax_lista_tipo_fondo.php?";
        
        ajax.open("GET",_URL_,true);
        ajax.send();
        
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 1) { //ocurrio algun error
                //Nada
            } else if (ajax.readyState == 4) { //si obtuvo los datos
                var response = ajax.responseText; //response es el JSON
                var data = JSON.parse(response); // parseamos el JSON a un array
                console.log(data);
                cargarTiposFondos(data);  
            }
        };  
        
    } 
     /**
     * Se encarga de enviar la información para la Actualización del tipo de fondo
    * */
    function update_fondo(){
        var old_fondo = document.getElementById('input_old_fondo').value;
        var new_fondo = document.getElementById('input_new_fondo').value;
        var cod_sia = parseInt(document.getElementById('cod_sia').value);
        
        if(new_fondo == ""){jAlert('Digite el nuevo fondo','mensaje');}
        else if (!validarNumLetra(new_fondo)){jAlert('El fondo no debe contener caracteres especiales ni espacios','mensaje');}
        else {    
        var ajax = NuevoAjax();
        var _URL_ = "mod/admin/proyecto/ajax_upd_fondo.php?";
        var _values_send = 
            'old_fondo=' + old_fondo +
            '&new_fondo='+ new_fondo +
            '&cod_sia='+ cod_sia;
          ajax.open("GET", _URL_ +"&"+ _values_send, true);
          ajax.onreadystatechange = function() {
                if (ajax.readyState == 1) {
                    //Nada
                } else if (ajax.readyState == 4) {
                    var response = ajax.responseText;
                    if (response == 0) {
                        document.getElementById('label-message').innerHTML = "Fondo modificado exitosamente";
                        document.getElementById('tip_fondo').value = new_fondo;
                    } else if (response == 1 || response == 2) {
                        jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS", "Error");
                    } else if (response == 3) {
                        jAlert("El miembro ya existe.\n Consulte a la USTDS", "Usuario ya existe");
                    } else {
                        jAlert("Ocurrio un error inesperado.\n Consulte a la USTDS", "Error inesperado");
                    }
                }
            };
        ajax.send(null); //envia la informacion al PHP
      }
    }
    
    function cargarTiposFondos(array){ //carga los fondos de la BD para mostrarlos
    var o = document.getElementById('selectBox');
    var valor = parseInt(jQuery('select[name=selectBox]').val()); //obligo que empieze desde la opcion von value 0
    for( var i = 0; i < array.length; i++){
        var option = document.createElement('option');
        option.text = array[i].tipo;
        valor++;
        option.value = valor.toString();
        o.add(option);    
    }
}

function mensajeFondoAgregado(dato){ //mensaje de confirmacion de agregacion de fondo
    document.getElementById('label-message').innerHTML = "Fondo ["+dato+"] agregado exitosamente";
}
    /**
     * Se encarga de limpiar los espacios relacionados al archivo pdf
    * */
    function limpiarArchivoModal(){
        document.getElementById('titulo').value = "";
        document.getElementById('descripcion').value = "";
        document.getElementById('archivo').value = "";
        document.getElementById('etiqueta').innerHTML= "";
    }
     /**
     * Se encarga de validar los campos a la hora de subir un archivo pdf
    * */
    function validatePDF(){
        var titulo = document.getElementById("titulo");
        var desc = document.getElementById("descripcion");
        var archivo = document.getElementById("archivo");
        
        if(titulo.value == "" || titulo.value == " "){
            document.getElementById("etiqueta").innerHTML = "Digite un nombre de archivo";
        } else if(desc.value == "" || desc.value == " "){
            document.getElementById("etiqueta").innerHTML = "Digite una descripción de archivo";
        } else if(archivo.value == ""){
            document.getElementById("etiqueta").innerHTML = "Agruegue un archivo";
        } else{
             document.getElementById("etiqueta").innerHTML = "Archivo subido";
        }     
  }
    
   /**
     * Se encarga de limpiar los espacios relacionados al tipo de fondo
    * */
function limpiarModalFondo(){
    document.getElementById('input_tip_fondo').value = "";
    document.getElementById('input_new_fondo').value = "";
    document.getElementById('etiqueta').innerHTML = "";
}

function agregarFondo(){
  /*agrega un fondo al combo box del formulario*/
        var valor = parseInt(jQuery('#selectBox option:last-child').val()); //obtenemos el "value" de la ultima opcion
        var texto = document.getElementById('input_tip_fondo').value;
        if(!validarNumLetra(texto)){jAlert("El fondo no debe contener caracteres especiales ni espacios","mensaje");}
        else if(texto == ""){jAlert("Escriba el fondo a agregar","mensaje");}
        else {
        var o = document.getElementById('selectBox');
        var option = document.createElement('option');
        valor++;
        option.text = texto;
        option.value = valor.toString();
        o.add(option);       
        jQuery('#selectBox').val(valor.toString()); //pone en "selected" la opcion recien agregada
        mensajeFondoAgregado(texto);
    } 
}
 /**
 * Se encarga de limpiar los espacios relacionados al tipo de fondo
    * */
function limpiarCampoMiembro(){
   document.getElementById('miem_ced').value = "";
   document.getElementById('miem_nombre').value = "";
   document.getElementById('miem_telefono').value = "";
   document.getElementById('miem_email').value = "";
   
   document.getElementById('TMiembro').value = "Responsable";
   document.getElementById('Jornada').value = "Ad honorem";
   document.getElementById("tipo_tel").value = "0";
}

function trans_cod_sia() {
    var temp = document.getElementById('miem_cod_sia');
    var temp2 = document.getElementById('cod_sia');
    if (temp2 != null) {
        temp2 = document.getElementById('cod_sia').value;
        document.getElementById("input_cod_sia").value = temp2;
    } else {
        temp = document.getElementById('miem_cod_sia').value;
        document.getElementById("input_cod_sia").value = temp;
    }
}
function ir_agregar_miembro(){
    var temp2 = document.getElementById('cod_sia').value;
    OpcionMenu('mod/admin/proyecto/agregar_integrantes.php?','cod_sia=' + temp2);
}

/*oculta el input para modificar fondo*/
function ocultarModFondo(){
    jQuery('#input_mod_fondo').hide();
}
 





function filter_type(campo) {
    var arrExtensions = new Array("pdf");
    var strFilePath = campo.value;
    var arrTmp = strFilePath.split(".");
    var strExtension = arrTmp[arrTmp.length - 1].toLowerCase();
    var blnExists = false;
    for (var i = 0; i < arrExtensions.length; i++) {
        if (strExtension == arrExtensions[i]) {
            fix_name(campo.id, "archivo");
            //add_file();
            blnExists = true;
            break;
        }
    }
    if (!blnExists) {
        jAlert("El archivo solo puede ser de extensión: pdf", "Error");
        campo.value = '';
    }
    return blnExists;
}






function verProyecto(dato){
    var rdato = '' + dato;
    OpcionMenu('mod/admin/proyecto/view_proyect.php?', 'cod_sia=' + rdato + '&view_mode=1');
}

function editarProyecto(dato){
      OpcionMenu('mod/admin/proyecto/edit_proyect.php?', 'cod_sia=' + dato + '&view_mode=1');
}
function verRecor(dato){
    var rdato = '' + dato;
    OpcionMenu('mod/admin/proyecto/view_record.php?', 'cod_sia=' + rdato + '&view_mode=1');
}

function editarRecor(dato){
      OpcionMenu('mod/admin/proyecto/edit_recor.php?', 'cod_sia=' + dato + '&view_mode=1');
}
/**
 * Abre la ventana que genera un reporte por proyecto
 */
function generarReportepProyecto(cod_sia,nombre){
    window.open("mod/admin/proyecto/reportePproy.php?cod_sia="+cod_sia+"&nom="+nombre+"");
}


function eliminarProyecto(dato){
    jConfirm("Desea eliminar el proyecto con Codigo SIA:" + dato, "Eliminar Proyecto", function (r) {
        if (r) { delete_proy(dato);} 
    });
}
function eliminarRecor(dato){
    jConfirm("Desea eliminar el recordatorio con Nombre:" + dato, "Eliminar Recordatorio", function (r) {
        if (r) { delete_record(dato);} 
    });
}

function verPDF(dato) {
    window.open("mod/admin/proyecto/archivo.php?id="+dato+"","frame");
}
function editarPDF(dato,nomb,desc,cod){
     document.getElementById("input_id").value = dato;
     document.getElementById("input_titulo").value = nomb;
     document.getElementById("input_desc").value = desc;
     document.getElementById("input_sia").value = cod;
}

function modPDF(){
    var id = document.getElementById("input_id").value;
    var titulo = document.getElementById("input_titulo").value;
    var desc = document.getElementById("input_desc").value;
    var cod = document.getElementById("input_sia").value;
    var ajax = NuevoAjax();
    var _values_send =
                'titulo=' + titulo +
                '&desc=' + desc +
                '&id=' + id;
        var _URL_ = "mod/admin/proyecto/ajax_upd_PDF.php?";
        ajax.open("GET", _URL_ + _values_send, true);
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 1) {
                //Nada
            } else if (ajax.readyState == 4) {
                var response = ajax.responseText;
                //alert(response); //DEBUG
                if (response == 0) {
                   jAlert("Documento modificado con éxito", "Éxito");
                   OpcionMenu('mod/admin/proyecto/view_proyect.php?', 'cod_sia=' + cod + '&view_mode=1');
                   
                } else if (response == 1 || response == 2) {
                    jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS", "Error");
                } else if (response == 3) {
                    jAlert("El archivo ya existe.\n Consulte a la USTDS", "Archivo ya existe");
                } else {
                    jAlert("Ocurrió un error inesperado.\n Consulte a la USTDS", "Error inesperado");
                }
            }
        };
          ajax.send(null);
}

function eliminarPDF(id,cod,nom){
    jConfirm("¿Desea eliminar el archivo seleccionado?","Eliminar Archivo", function (r){
       if (r){
           delete_pdf(id,cod,nom);
          //window.open("mod/admin/proyecto/eliminar.php?id="+id+"");
          //OpcionMenu('mod/admin/proyecto/view_proyect.php?', 'cod_sia=' + cod + '&view_mode=1');
       } 
    });    
}
//FUNCIONES DE MANTENIMIENTO PARA MIEMBROS RELACIONADOS A UN PROYECTO//////////////////////////
function verMiembro(dato){
    OpcionMenu('mod/admin/proyecto/view_integrante.php?', 'ced_miem=' + dato + '&view_mode=1');
}

function editarMiembro(dato){
    OpcionMenu('mod/admin/proyecto/edit_integrante.php?', 'ced_miem=' + dato + '&view_mode=1');
}

function eliminarMiembro(dato,cod){
     jConfirm("Desea eliminar del proyecto al participante con Cédula:" + dato, "Eliminar Participante", function (r) {
        if (r) { delete_member(dato,cod);} });
   
}
///////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////FUNCIONES DE MANTENIMIENTO PARA MIEMBROS EN GENERAL//////////////////////////////
function verIntegrante(dato) {
     OpcionMenu('mod/admin/proyecto/view_integrante_total.php?', 'ced_miem=' + dato + '&view_mode=1');
}

function editarIntegrante(dato) {
    OpcionMenu('mod/admin/proyecto/edit_integrante_total.php?', 'ced_miem=' + dato + '&view_mode=1');
}

function eliminarIntegrante (dato) {
         jConfirm("Recuerde que esta acción es irreversible y se borrá el integrante de todo proyecto al que esté asociado. Sabiendo esto desea eliminar el participante con Cédula:" + dato, "Eliminar Participante", function (r) {
        if (r) { delete_absolute_member(dato);} });
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function funciones() {
    if (validarFormulario()) {
        new_proy(); 
    }
}
function agrecordatorio(){
    var nombre = jQuery('#tipo_tel option:selected').text();
    var subject = document.getElementById('miem_ced').value;
    var email = document.getElementById('miem_nombre').value;
    var dia_ini=document.getElementById('fecha_1_2').value;
    var mes_ini=document.getElementById('fecha_1_1').value;
    var ano_ini= document.getElementById('fecha_1_3').value;
    var fech_ini=ano_ini + '-' + mes_ini + '-' + dia_ini;
	var body = document.getElementById('desc_roll').value;
        //Preparacion  llamada AJAX 
        var ajax = NuevoAjax();
        var _values_send =
                'nombre=' + nombre +
                '&subject=' + subject +
                '&email=' + email  +
                '&fech='+ fech_ini +
                '&body=' + body;
        var _URL_ = "mod/admin/proyecto/ajax_new_record.php?";
        //alert(_URL_ + _values_send); //DEBUG
        ajax.open("GET", _URL_ + _values_send, true);
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 1) {
                //Nada
            } else if (ajax.readyState == 4) {
                var response = ajax.responseText;
                //alert(response); //DEBUG
                if (response == 0) {
                    jAlert("Recordatorio añadido con éxito", "Éxito");
                    OpcionMenu('mod/admin/proyecto/Recordatorios.php?','nombre=' + nombre);
                } else if (response == 1 || response == 2) {
                    jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS", "Error");
                } else if (response == 3) {
                    jAlert("El Proyecto ya existe.\n Consulte a la USTDS", "Usuario ya existe");
                } else {
                    jAlert("Ocurrio un error inesperado.\n Consulte a la USTDS", "Error inesperado");
                }
            }
        };

        ajax.send(null); 
    
}


function funciones2() { /*para formulario de agregar miembros*/
    if (document.getElementById('radio-miembros').checked) { //No agregar mas integrantes : yes
        if (document.getElementById('inlineCheckbox2').checked == true) { //Existe miembro : no 
            
            /*Verificamos si algun campo posee informacion, si lo tiene,
             * el usuario planea agregar a alguien*/
            if (noMasMiembros() == 0) { //todos los campos vacios
                OpcionMenu('mod/admin/proyecto/listar_integrantes.php?', '');
            } else { //existe algun dato en algun campo
                if (validarMiembro()) {
                    new_member();
                    sleep(3000);
                    OpcionMenu('mod/admin/proyecto/listar_integrantes.php?', '');
                }
            }
        } else { //Existe miembro : si
            reuse_member();
            sleep(3000);
            OpcionMenu('mod/admin/proyecto/listar_integrantes.php?', '');
        }
    } else { //No agregar mas integrantes : no (sin check)
        if (document.getElementById('inlineCheckbox1').checked == true) { //Existe miembro : si
            reuse_member();
        } else { //Existe miembro : no
            if (validarMiembro()) {
                new_member();
            }
        }
    }
}

function new_event() {   
    var title = document.getElementById('titletxt').value;
    var desc = document.getElementById('descripciontxt').value;
    var fech = document.getElementById('fechaIniciotxt').value +" "+document.getElementById('horaInitxt').value+":00";
    var fech2 = document.getElementById('fechaFintxt').value +" "+document.getElementById('horaFintxt').value+":00";
    var color = document.getElementById('colortxt').value.substr(1);
        //Preparacion  llamada AJAX 
        var ajax = NuevoAjax();
        var _values_send =
                '&title=' + title +
                '&desc=' + desc +
                '&start=' + fech  +
                '&end='+ fech2 +
                '&color=' + color;
        var _URL_ = "mod/admin/proyecto/ajax_new_even.php?";
        //alert(_URL_ + _values_send); //DEBUG
        ajax.open("GET", _URL_ + _values_send, true);
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 1) {
                //Nada
            } else if (ajax.readyState == 4) {
                var response = ajax.responseText;
                //alert(response); //DEBUG
                if (response == 0) {
                    //jAlert("Proyecto añadido con éxito", "Éxito");
                   // OpcionMenu('mod/admin/proyecto/calendario.php?','title=' + title);
                } else if (response == 1 || response == 2) {
                    jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS", "Error");
                } else if (response == 3) {
                    jAlert("El evento ya existe.\n Consulte a la USTDS", "Usuario ya existe");
                } else {
                    jAlert("Ocurrió un error inesperado.\n Consulte a la USTDS", "Error inesperado");
                }
            }
        };

        ajax.send(null); //envia la informacion al PHP
    }
    
    function update_event(id) {
    var title = document.getElementById('titletxt2').value;
    var desc = document.getElementById('descripciontxt2').value;
    var fech = document.getElementById('fechaIniciotxt2').value + " " + document.getElementById('horaInitxt2').value;
    var fech2 = document.getElementById('fechaFintxt2').value + " " + document.getElementById('horaFintxt2').value;
    var color = document.getElementById('colortxt2').value.substr(1);
    var ajax = NuevoAjax();
    var _URL_ = "mod/admin/proyecto/ajax_upd_even.php?";
    var _values_send =
            '&id=' + id +
            '&title=' + title +
            '&desc=' + desc +
            '&start=' + fech +
            '&end=' + fech2 +
            '&color=' + color;
    ajax.open("GET", _URL_ + _values_send, true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 1) {
            //Nada
        } else if (ajax.readyState == 4) {
            var response = ajax.responseText;
            if (response == 0) {
               jAlert("Evento actualizado");
            } else if (response == 1 || response == 2) {
                jAlert("Error en la Base de Datos, intente nuevamente.\n Si persiste informe a la USTDS", "Error");
            } else if (response == 3) {
                jAlert("El evento ya existe.\n Consulte a la USTDS");
            } else {
                jAlert("Ocurrió un error inesperado.\n Consulte a la USTDS", "Error inesperado");
            }
        }
    };
    ajax.send(null); //envia la informacion al PHP 
}
    
function eliminarEvento(dato) {
    jConfirm("¿Está seguro de eliminar el evento?", "Eliminar Evento", function (r) {
        if (r) {
            delete_event(dato);
        }
    });
}

function delete_event(id) {
    var ajax = NuevoAjax();
    //Preparacion  llamada AJAX
    var _values_send = 'id_even=' + id;
    var _URL_ = "mod/admin/proyecto/ajax_del_even.php?";
    ajax.open("GET", _URL_+_values_send, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 1) {
            //nada
        } else if (ajax.readyState == 4) {
            var response = ajax.responseText;
            //alert(response); //DEBUG
            if (response == 0) {
                OpcionMenu('mod/admin/proyecto/calendario.php?', '');
            } else if (response == 1 || response == 2) {
                jAlert('Ha ocurrido un error en la Base de Datos Intentelo Nuevamente\n Si el problema continua comuniquese con la USTDS', 'Error');
                OpcionMenu('mod/admin.proyecto/calendario.php?', '');
            } else {
                jAlert('Ha ocurrido un error inesperado intentelo más tarde!', 'Error');
                OpcionMenu('mod/admin/proyecto/calendario.php?', '');
            }
        }
    };
    ajax.send(null);
}