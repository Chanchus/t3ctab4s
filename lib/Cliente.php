<?php


    class Cliente {

        public $Name;

        public $Correo;


        function __construct($pName, $pCorreo)
        {
            $this->Name = $pName;
            $this->Correo = $pCorreo;
        }
    }