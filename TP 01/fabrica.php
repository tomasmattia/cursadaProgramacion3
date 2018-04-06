<?php
    require("./empleado.php");
    class Fabrica 
    {
        private $_cantidadMaxima;
        private $_empleados=array();
        private $_razonSocial;

        public function __construct($razonSocial)
        {
            $this->_cantidadMaxima=5;
            $this->_empleados=array();
            $this->_razonSocial=$razonSocial;
        }

        public function AgregarEmpleado($empleado)
        {
            if(count($this->_empleados)<$this->_cantidadMaxima)
            {
                array_push($this->_empleados,$empleado);
                $this->EliminarEmpleadosRepetidos();
                return true;
            }
            return false;
        }

        public function CalcularSueldos()
        {
            $sueldos=0;
            foreach($this->_empleados as $empleado)
            {
                $sueldos += $empleado->GetSueldo();
            }
            return $sueldos;
        }

        public function EliminarEmpleado($empleado)
        {
            if($index=array_search($empleado,$this->_empleados))
            {
                unset($this->_empleados[$index]);
            }
            return false;
        }

        public function EliminarEmpleadosRepetidos()
        {
            if(count($this->_empleados)>=2)
            {
                $this->_empleados = array_unique($this->_empleados);
            }
        }

        public function ToString()
        {
            $stringRetorno=$this->_razonSocial." -  Cantidad Maxima de Empleados: ".$this->_cantidadMaxima." - Cantidad Actual de Empleados:  ".count($this->_empleados)."</br>";
            foreach($this->_empleados as $empleado)
            {
                $stringRetorno = $stringRetorno."</br>".$empleado->ToString();
            }
            return $stringRetorno;
        }
    }
?>