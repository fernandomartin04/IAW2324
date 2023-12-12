var errores;

//Con esto hago que se vacíe el <p> de los errores
function reinicio() {
    errores = 0;
    document.getElementById("easunto").innerHTML="";
    document.getElementById("edni").innerHTML="";
    document.getElementById("enombre").innerHTML="";
    document.getElementById("e1apellido").innerHTML="";
    document.getElementById("enacimiento").innerHTML="";
    document.getElementById("etelefono").innerHTML="";
    document.getElementById("eemail").innerHTML="";
    document.getElementById("edomicilio").innerHTML="";
    document.getElementById("emunicipio").innerHTML="";
    document.getElementById("eoficina").innerHTML="";
    document.getElementById("einfo").innerHTML="";
    document.getElementById("eanexo1").innerHTML="";
    document.getElementById("eanexo2").innerHTML="";
    document.getElementById("eacepto").innerHTML="";
    document.getElementById("ecp").innerHTML="";
    document.getElementById("eanexo1").innerHTML="";
    document.getElementById("eanexo2").innerHTML="";

}

//Función de validación del email
function validateEmail(){ 
                
	// Get our input reference.
	var emailField = document.getElementById('correo');
	
	// Define our regular expression.
	var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

	// Using test we can check if the text match the pattern
	if( validEmail.test(emailField.value) ){
		return true;
	}else{
		return false;
	}
} 

//Funcion validar anexo1
function validarAnexo1() {
    // Obtener nombre de archivo
    let archivo = document.getElementById('anexo1').value,
    // Obtener extensión del archivo
        extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);
    // Si la extensión obtenida no está incluida en la lista de valores
    // del atributo "accept", mostrar un error.
    if(document.getElementById('anexo1').getAttribute('accept').split(',').indexOf(extension) < 0) {
        return false;
    }
}

//Funcion validar anexo2
function validarAnexo2() {
    // Obtener nombre de archivo
    let archivo = document.getElementById('anexo1').value,
    // Obtener extensión del archivo
        extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);
    // Si la extensión obtenida no está incluida en la lista de valores
    // del atributo "accept", mostrar un error.
    if(document.getElementById('anexo2').getAttribute('accept').split(',').indexOf(extension) < 0) {
        return false;
    }
}



function validar() {
    reinicio();  
    validateEmail();  
    validarAnexo1();
    validarAnexo2();

    //EMAIL
    if (validateEmail() == false) {
        document.getElementById("eemail").innerHTML = "El email no existe";
        errores+=1;
    }

    //ASUNTO
    var asunto = document.getElementById("asunto").value;
    
    if (asunto == ""){
        document.getElementById("easunto").innerHTML="Requerido";
        errores+=1;
    }

    //DNI
    var dni = document.getElementById("dni").value;
    var numero, let, letra;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;
    dni = dni.toUpperCase();

    if (dni == "") {
        document.getElementById("edni").innerHTML='Requerido';
        errores+=1; 
    }
    else if(expresion_regular_dni.test(dni) === true){
        numero = dni.substr(0,dni.length-1);
        numero = numero.replace('X', 0);
        numero = numero.replace('Y', 1);
        numero = numero.replace('Z', 2);
        let = dni.substr(dni.length-1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero+1);
        if (letra != let) {
            document.getElementById("edni").innerHTML='Dni erroneo, la letra del NIF no se corresponde';
            errores+=1; 
        }
        else{

        }
    }
    else{
        document.getElementById("edni").innerHTML='Dni erroneo, formato no válido';
        errores+=1; 
    }
    
    //NOMBRE
    var nombre = document.getElementById("nombre").value;

    if (nombre == ""){
        document.getElementById("enombre").innerHTML="Requerido";
        errores+=1;
    }

    //1 APELLIDO
    var apellido = document.getElementById("1apellido").value;

    if (apellido == ""){
        document.getElementById("e1apellido").innerHTML="Requerido";
        errores+=1;
    }

    //NACIMIENTO
    var nacimiento = document.getElementById("nacimiento").value;

    if (nacimiento == ""){
        document.getElementById("enacimiento").innerHTML="Requerido";
        errores+=1;
    }

    //TELÉFONO
    var telefono = document.getElementById("telefono").value;

    if (telefono.length != 9) {
        document.getElementById("etelefono").innerHTML='Teléfono erroneo';
        errores+=1; 
    }

    //DOMICILIO
    var domicilio = document.getElementById("domicilio").value;

    if (domicilio == ""){
        document.getElementById("edomicilio").innerHTML="Requerido";
        errores+=1;
    }

    //COD POSTAL
    var cp = document.getElementById("cp").value;

    if (cp == ""){
        document.getElementById("ecp").innerHTML="Requerido";
        errores+=1;
    }

    //MUNICIPIO
    var municipio = document.getElementById("municipio").value;

    if (municipio == "selecciona"){
        document.getElementById("emunicipio").innerHTML="Requerido";
        errores+=1;
    }

    //OFICINA
    var oficina = document.getElementById("oficina").value;

    if (oficina == "selecciona"){
        document.getElementById("eoficina").innerHTML="Requerido";
        errores+=1;
    }

    //INFO
    var info = document.getElementById("info").value;

    if (info == ""){
        document.getElementById("einfo").innerHTML="Requerido";
        errores+=1;
    }

    //ANEXO1
    if (validarAnexo1() == false) {
        document.getElementById("eanexo1").innerHTML = "Error de formato del archivo";
    }
    
    //ANEXO1
    if (validarAnexo2() == false) {
        document.getElementById("eanexo2").innerHTML = "Error de formato del archivo";
    }

    //CHECKBOX
    var isChecked = document.getElementById('acepto').checked;
    if(!isChecked){
        document.getElementById("eacepto").innerHTML="Requerido";
        errores+=1;
    }

    //CONFIRMACIÓN
    if (errores == 0) {
        alert("ok");
    }
}