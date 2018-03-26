<?php
    abstract class FiguraGeometrica
    {
        protected $_color;
        protected $_perimetro;
        protected $_superficie;
        
        public function __construct()
        {
            $this->_color="red";
        }

        public function GetColor()
        {
            return $_color;
        }

        public function SetColor($valor)
        {
            $this->_color=$valor;
        }

        public function ToString()
        {
            return $_color;
        }

        public abstract function Dibujar();
        protected abstract function CalcularDatos();
    }

    class Rectangulo extends FiguraGeometrica
    {
        private $_ladoUno;
        private $_ladoDos;

        public function __construct($ladoUno,$ladoDos)
        {
            parent::__construct();
            $this->_ladoUno=$ladoUno;
            $this->_ladoDos=$ladoDos;
            $this->CalcularDatos();
        }

        protected function CalcularDatos()
        {
            $this->_perimetro=($this->_ladoUno*2)+($this->_ladoDos*2);
            $this->_superficie=$this->_ladoUno*$this->_ladoDos;
        }

        public function Dibujar()
        {
            for($i=1;$i<=$this->_ladoDos;$i++)
            {
                for($k=1;$k<=$this->_ladoUno;$k++)
                {
                    echo "*";
                }
                echo "<br>";
            }
        }
    }

    class Triangulo extends FiguraGeometrica
    {
        private $_altura;
        private $_base;

        public function __construct($altura,$base)
        {
            parent::__construct();
            $this->_altura=$altura;
            $this->_base=$base;
            $this->CalcularDatos();
        }

        protected function CalcularDatos()
        {
            $this->_perimetro=0;
            $this->_superficie=($this->_base*$this->_altura)/2;
        }

        public function Dibujar()
        {
            
            $lineaDibujo="<div style='color:".$this->_color."'";
            $cantidadAst=1;
            for($i=0;$i<=$this->_altura;$i++)
            {
                for($k=0;$k<=$cantidadAst;$k++)
                {
                    $lineaDibujo=$lineaDibujo."*";
                    $cantidadAst+=1;
                }
                $lineaDibujo=$lineaDibujo."<br>"; 
            }
            $lineaDibujo=$lineaDibujo."</div>";
            echo $lineaDibujo;
            
        }
    }

    $unTriangulo= new Triangulo(5,3);
    $unTriangulo->Dibujar();

?>