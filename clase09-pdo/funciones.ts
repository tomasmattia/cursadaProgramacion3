namespace Test
{
    export class Validadora
    {
        public static TomarMetodo(valor:string):void
        {
            console.log(valor);
            (<HTMLFormElement>document.getElementById('formulario')).method=valor;
        }
    }
}