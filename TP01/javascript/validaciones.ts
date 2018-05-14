function AdministrarValidaciones():boolean
{
    const dni:number=Number((<HTMLInputElement>document.getElementById("txtDni")).value);
    const legajo:number=Number((<HTMLInputElement>document.getElementById("txtLegajo")).value);
    const sueldo:number=Number((<HTMLInputElement>document.getElementById("txtSueldo")).value);
    const apellido:string=((<HTMLInputElement>document.getElementById("txtApellido")).value);
    const nombre:string=((<HTMLInputElement>document.getElementById("txtNombre")).value);
    const sexo:string=((<HTMLInputElement>document.getElementById("cboSexo")).value);
    const imagen:string=((<HTMLInputElement>document.getElementById("imagen")).value);
    
    AdministrarSpanError("txtApellido",!ValidarCamposVacios(apellido));
    AdministrarSpanError("txtNombre",!ValidarCamposVacios(nombre));
    AdministrarSpanError("txtLegajo",!ValidarCamposVacios(legajo.toString()));
    AdministrarSpanError("txtDni",!ValidarCamposVacios(dni.toString()));
    AdministrarSpanError("txtSueldo",!ValidarCamposVacios(sueldo.toString()));
    AdministrarSpanError("cboSexo",!ValidarCamposVacios(sexo.toString()));
    AdministrarSpanError("txtDni",!ValidarRangoNumerico(1000000,55000000,dni));
    AdministrarSpanError("cboSexo",!ValidarCombo(sexo));
    AdministrarSpanError("txtLegajo",!ValidarRangoNumerico(100,550,legajo));
    AdministrarSpanError("txtSueldo",!ValidarRangoNumerico(8000,ObtenerSueldoMaximo(ObtenerTurnoSeleccionado()),sueldo));
    AdministrarSpanError("txtApellido",!ValidarCamposVacios(apellido));

    return VerificarValidacionesLogin();
}

function AdministrarValidacionesLogin()
{
    const dni:number=Number((<HTMLInputElement>document.getElementById("txtDni")).value);
    const apellido:string=((<HTMLInputElement>document.getElementById("txtApellido")).value);
    AdministrarSpanError("txtDni",!ValidarCamposVacios(dni.toString()));
    AdministrarSpanError("txtDni",!ValidarRangoNumerico(1000000,55000000,dni));
    AdministrarSpanError("txtApellido",!ValidarCamposVacios(apellido));

    return VerificarValidacionesLogin();
}

function ValidarCamposVacios(campo:string):boolean
{
    if(campo!="")
    {
        return true;
    }
    return false;
}

function ValidarRangoNumerico(min:number,max:number,num:number):boolean
{
    if(num>=min && num<=max)
    {
        return true;
    }
    return false;
}

function ValidarCombo(sexo:string, defecto="default"):boolean
{
    if(sexo!=defecto)
    {
        return true;
    }
    return false;
}

function ObtenerTurnoSeleccionado():string
{
    if((<HTMLInputElement>document.getElementById("tManana")).checked)
    {
        return "Manana";
    }    
    else
    {
        if((<HTMLInputElement>document.getElementById("tTarde")).checked)
        {
            return "Tarde";
        }
        else((<HTMLInputElement>document.getElementById("tNoche")).checked)
        {
            return "Noche";
        }
    }
}

function ObtenerSueldoMaximo(turno:string):number
{
    switch(turno)
    {
        case "Manana":
            return 20000;
        case "Tarde":
            return 18500;
        case "Noche":
            return 25000;
    }
    return 0;
}

function AdministrarSpanError(unId:string, bandera:boolean):void
{
    if(bandera)
    {
        (<HTMLElement>(<HTMLElement>document.getElementById(unId)).nextElementSibling).style.display="block";
    }
    else
    {
        (<HTMLElement>(<HTMLElement>document.getElementById(unId)).nextElementSibling).style.display="none";
    }
}

function VerificarValidacionesLogin(): boolean {
    let boolRetorno = true;
    let todoSpan: NodeList = document.querySelectorAll("span");

    for(let i=0;i<todoSpan.length;i++)
    {
        if((<HTMLSpanElement>todoSpan[i]).style.display=="block")
        {
            boolRetorno=false;
            break;
        }
    }

    return boolRetorno;
}

function AdministrarModificar(dniEmpleado: string) {
    (<HTMLInputElement>document.getElementById("hidModificar")).value = dniEmpleado;
    (<HTMLFormElement>document.getElementById("frmModificar")).submit();
}

function ModificarEmpleado(dni: string, apellido: string, nombre: string, sexo: string, legajo: string, sueldo: string, turno: string, foto: string): void
{
    let turnoSeleccionado = turno;
    let sexoSeleccionado = 0;
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
    (<HTMLElement>document.getElementById("tituloForm")).innerHTML = "Modificar Empleado";
    (<HTMLInputElement>document.getElementById("btnEnviar")).value = "Modificar";

    (<HTMLInputElement>document.getElementById("txtDni")).value = dni;
    (<HTMLInputElement>document.getElementById("txtDni")).readOnly = true;
    (<HTMLInputElement>document.getElementById("txtApellido")).value = apellido;
    (<HTMLInputElement>document.getElementById("txtNombre")).value = nombre;
    (<HTMLSelectElement>document.getElementById("cboSexo")).selectedIndex = sexoSeleccionado;
    (<HTMLInputElement>document.getElementById("txtLegajo")).value = legajo;
    (<HTMLInputElement>document.getElementById("txtLegajo")).readOnly = true;
    (<HTMLInputElement>document.getElementById("txtSueldo")).value = sueldo;
    (<HTMLInputElement>document.getElementById("hdnModificar")).value = dni;
    (<HTMLInputElement>document.getElementById(turnoSeleccionado)).checked = true;


}