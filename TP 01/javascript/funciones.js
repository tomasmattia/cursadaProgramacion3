function AdministrarValidaciones() {
    var dni = Number(document.getElementById("txtDni").value);
    var legajo = Number(document.getElementById("txtLegajo").value);
    var sueldo = Number(document.getElementById("txtSueldo").value);
    var apellido = (document.getElementById("txtApellido").value);
    var nombre = (document.getElementById("txtNombre").value);
    var sexo = (document.getElementById("cboSexo").value);
    if (!ValidarRangoNumerico(1000000, 55000000, dni)) {
        alert("Dni invalido");
    }
    if (!ValidarCamposVacios(apellido) || !ValidarCamposVacios(nombre)) {
        console.log("Falta completar datos");
        alert("Falta completar datos");
    }
    if (!ValidarCombo(sexo)) {
        alert("Sexo invalido");
    }
    if (!ValidarRangoNumerico(100, 550, legajo)) {
        alert("Legajo invalido");
    }
    if (!ValidarRangoNumerico(8000, ObtenerSueldoMaximo(ObtenerTurnoSeleccionado()), sueldo)) {
        alert("Sueldo invalido");
    }
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
