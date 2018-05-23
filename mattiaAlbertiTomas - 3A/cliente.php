<?php
    class Cliente
    {
        private $nombre;
        private $correo;
        private $clave;

        public function ToString(){
            return $nombre."-".$correo."-".$clave;
        }

        public static function GuardarEnArchivo($cliente){
            $ruta="./clientes/clientesActuales.txt";
            $archivoDeClientes=fopen($ruta,"w");
            $auxEscritura = "";
            $auxEscritura=$auxEscritura.$cliente->ToString()."\r\n";
            if(!(fwrite($archivoDeClientes, $auxEscritura))){
                fclose($archivoDeClientes);            
                echo "Error en la carga";
            }
            
            fclose($archivoDeClientes);        
            echo "Carga Exitosa";
        }

        public function __construct($nombre,$correo,$clave)
        {
            $this->nombre=$nombre;
            $this->correo=$correo;
            $this->clave=$clave;
        }
    }
?>