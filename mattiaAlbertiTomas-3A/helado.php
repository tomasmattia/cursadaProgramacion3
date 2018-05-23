<?php
    require_once "interface.php";
    class Helado implements IVendible
    {
        private $sabor;
        private $precio;

        public function __construct($sabor,$precio)
        {
            $this->sabor=$sabor;
            $this->precio=$precio;
        }

        public function GetPathFoto()
        {
            return $this->_pathFoto;
        }

        public function SetPathFoto($pathFoto)
        {
            $this->_pathFoto=$pathFoto;
        }
        
        public static function RetornarArrayDeHelados()
        {
            $arrayHelados=array();
            $heladito1=new Helado("Chocolate",4);
            array_push($arrayHelados,$heladito1);
            $heladito2=new Helado("Vainilla",5);
            array_push($arrayHelados,$heladito2);
            $heladito3=new Helado("Coco",6);
            array_push($arrayHelados,$heladito3);
            $heladito4=new Helado("Americana",7);
            array_push($arrayHelados,$heladito4);
            $heladito5=new Helado("Granizado",8);
            array_push($arrayHelados,$heladito5);
            return $arrayHelados;
        }

        public function PrecioMasIva()
        {
            return $this->precio * 1.21;
        }

        public static function TraerDeArchivo()
        {
            $arrayDeHelados=array();
            $rutaArchivo="./heladosArchivo/helados.txt";
            $elArchivo=fopen($rutaArchivo,"r");
            while(!feof($elArchivo))
            {
                $heladoString=trim(fgets($elArchivo));
                if($heladoString!="")
                {
                    $datoHelado=explode("-",$heladoString);
                    $helado = new Helado($datoHelado[0],$datoHelado[1]);
                    $this->SetPathFoto($datoHelado[2]);
                    array_push($arrayDeHelados,$helado);
                }
            }
            fclose($elArchivo);
            return $arrayDeHelados;
        }

    }

?>