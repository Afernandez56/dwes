<?php
class Empleado {
    public function __construct(
        protected string $nombre,
        protected string $apellido,
        protected float $sueldo = 1000

    ) {}
        public function getNombreCompleto() : string {
        return "Tu nombre completo es: ". $this->nombre . " " .$this->apellido;
    }

    public function pagaImpuestos() : bool {
        return ($this->sueldo > 3333);
    }
}

    $empleado1 = new Empleado("Juan", "Perez");
    $empleado2 = new Empleado("Juan", "Perez", 7000);
    echo $empleado1->getNombreCompleto()."/".$empleado2->getNombreCompleto();
    echo $empleado1->pagaImpuestos()."/".$empleado2->pagaImpuestos();
?>