<?php
require_once "312Trabajador.php";
class Empresa {
    public function __construct(
        protected string $nombre,
        protected string $direccion,
        protected array $trabajadores
    )
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->trabajadores = $trabajadores;
    }

    


        /**
         * Get the value of nombre
         */
        public function getNombre(): string
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         */
        public function setNombre(string $nombre): self
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of direccion
         */
        public function getDireccion(): string
        {
                return $this->direccion;
        }

        /**
         * Set the value of direccion
         */
        public function setDireccion(string $direccion): self
        {
                $this->direccion = $direccion;

                return $this;
        }

        /**
         * Get the value of trabajadores
         */
        public function getTrabajadores(): array
        {
                return $this->trabajadores;
        }

        /**
         * Set the value of trabajadores
         */
        public function setTrabajadores(array $trabajadores): self
        {
                $this->trabajadores = $trabajadores;

                return $this;
        }


        public function anyadirTrabajador(Trabajador312 $t){

        }

        public function listarTrabajadoresHtml() : string {
            return 
        }
}

?>