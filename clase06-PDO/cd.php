<?php
    class Cd
    {
        public $titulo;
        public $interprete;
        public $anio;

        public function ToString()
        {
            return $this->titulo.'-'.$this->interprete.'-'.$this->anio;
        }
    }

?>