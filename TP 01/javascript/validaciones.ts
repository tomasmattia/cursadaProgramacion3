function AdministrarValidaciones()
{
    const dni:number=Number((<HTMLInputElement>document.getElementById("txtDni")).value);
    const legajo:number=Number((<HTMLInputElement>document.getElementById("txtLegajo")).value);
    const sueldo:number=Number((<HTMLInputElement>document.getElementById("txtSueldo")).value);
    const apellido:string=((<HTMLInputElement>document.getElementById("txtApellido")).value);
    const nombre:string=((<HTMLInputElement>document.getElementById("txtNombre")).value);
    const sexo:string=((<HTMLInputElement>document.getElementById("cboSexo")).value);
    if(!ValidarRangoNumerico(1000000,55000000,dni))
    {
        alert("Dni invalido");
    }
    if(!ValidarCamposVacios(apellido) || !ValidarCamposVacios(nombre))
    {
        console.log("Falta completar datos");
        alert("Falta completar datos");
    }
    if(!ValidarCombo(sexo))
    {
        alert("Sexo invalido");
    }
    if(!ValidarRangoNumerico(100,550,legajo))
    {
        alert("Legajo invalido");
    }
    if(!ValidarRangoNumerico(8000,ObtenerSueldoMaximo(ObtenerTurnoSeleccionado()),sueldo))
    {
        alert("Sueldo invalido");
    }
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