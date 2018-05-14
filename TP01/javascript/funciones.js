function AdministrarValidaciones() {
    var dni = Number(document.getElementById("txtDni").value);
    var legajo = Number(document.getElementById("txtLegajo").value);
    var sueldo = Number(document.getElementById("txtSueldo").value);
    var apellido = (document.getElementById("txtApellido").value);
    var nombre = (document.getElementById("txtNombre").value);
    var sexo = (document.getElementById("cboSexo").value);
    var imagen = (document.getElementById("imagen").value);
    AdministrarSpanError("txtApellido", !ValidarCamposVacios(apellido));
    AdministrarSpanError("txtNombre", !ValidarCamposVacios(nombre));
    AdministrarSpanError("txtLegajo", !ValidarCamposVacios(legajo.toString()));
    AdministrarSpanError("txtDni", !ValidarCamposVacios(dni.toString()));
    AdministrarSpanError("txtSueldo", !ValidarCamposVacios(sueldo.toString()));
    AdministrarSpanError("cboSexo", !ValidarCamposVacios(sexo.toString()));
    AdministrarSpanError("txtDni", !ValidarRangoNumerico(1000000, 55000000, dni));
    AdministrarSpanError("cboSexo", !ValidarCombo(sexo));
    AdministrarSpanError("txtLegajo", !ValidarRangoNumerico(100, 550, legajo));
    AdministrarSpanError("txtSueldo", !ValidarRangoNumerico(8000, ObtenerSueldoMaximo(ObtenerTurnoSeleccionado()), sueldo));
    AdministrarSpanError("txtApellido", !ValidarCamposVacios(apellido));
    return VerificarValidacionesLogin();
}
function AdministrarValidacionesLogin() {
    var dni = Number(document.getElementById("txtDni").value);
    var apellido = (document.getElementById("txtApellido").value);
    AdministrarSpanError("txtDni", !ValidarCamposVacios(dni.toString()));
    AdministrarSpanError("txtDni", !ValidarRangoNumerico(1000000, 55000000, dni));
    AdministrarSpanError("txtApellido", !ValidarCamposVacios(apellido));
    return VerificarValidacionesLogin();
}
function ValidarCamposVacios(campo) {
    if (campo != "") {
        return true;
    }
    return false;
}
function ValidarRangoNumerico(min, max, num) {
    if (num >= min && num <= max) {
        return true;
    }
    return false;
}
function ValidarCombo(sexo, defecto) {
    if (defecto === void 0) { defecto = "default"; }
    if (sexo != defecto) {
        return true;
    }
    return false;
}
function ObtenerTurnoSeleccionado() {
    if (document.getElementById("tManana").checked) {
        return "Manana";
    }
    else {
        if (document.getElementById("tTarde").checked) {
            return "Tarde";
        }
        else
            (document.getElementById("tNoche").checked);
        {
            return "Noche";
        }
    }
}
function ObtenerSueldoMaximo(turno) {
    switch (turno) {
        case "Manana":
            return 20000;
        case "Tarde":
            return 18500;
        case "Noche":
            return 25000;
    }
    return 0;
}
function AdministrarSpanError(unId, bandera) {
    if (bandera) {
        document.getElementById(unId).nextElementSibling.style.display = "block";
    }
    else {
        document.getElementById(unId).nextElementSibling.style.display = "none";
    }
}
function VerificarValidacionesLogin() {
    var boolRetorno = true;
    var todoSpan = document.querySelectorAll("span");
    for (var i = 0; i < todoSpan.length; i++) {
        if (todoSpan[i].style.display == "block") {
            boolRetorno = false;
            break;
        }
    }
    return boolRetorno;
}
function AdministrarModificar(dniEmpleado) {
    document.getElementById("hidModificar").value = dniEmpleado;
    document.getElementById("frmModificar").submit();
}
function ModificarEmpleado(dni, apellido, nombre, sexo, legajo, sueldo, turno, foto) {
    var turnoSeleccionado = turno;
    var sexoSeleccionado = 0;
    switch (sexo) {
        case "masculino":
            sexoSeleccionado = 1;
            break;
        case "femenino":
            sexoSeleccionado = 2;
            break;
    }
    switch (turno) {
        case "tManana":
            turnoSeleccionado = "tManana";
            break;
        case "tTarde":
            turnoSeleccionado = "tTarde";
            break;
        case "tNoche":
            turnoSeleccionado = "tNoche";
            break;
    }
    document.title = "HTML5 Formulario Modificar Empleado";
    document.getElementById("tituloForm").innerHTML = "Modificar Empleado";
    document.getElementById("btnEnviar").value = "Modificar";
    document.getElementById("txtDni").value = dni;
    document.getElementById("txtDni").readOnly = true;
    document.getElementById("txtApellido").value = apellido;
    document.getElementById("txtNombre").value = nombre;
    document.getElementById("cboSexo").selectedIndex = sexoSeleccionado;
    document.getElementById("txtLegajo").value = legajo;
    document.getElementById("txtLegajo").readOnly = true;
    document.getElementById("txtSueldo").value = sueldo;
    document.getElementById("hdnModificar").value = dni;
    document.getElementById(turnoSeleccionado).checked = true;
}
