<?php 
require_once "312Trabajador.php";
class Empleado312 extends Trabajador312{


    public function __construct(
        string $nombre,
        string $apellido,
        int $edad,
        array $telefonos,
        protected int $horasTrabajadas,
        protected float $precioPorHora
    ){ 
        parent::__construct($nombre, $apellido, $edad, $telefonos);
    }

    #[Override]
    public function calcularSueldo(): float{
            return $this->horasTrabajadas*$this->precioPorHora;
    }


}
$empleado = new Empleado312("Carlos", "García", 20, [600111222], 40, 15.5);

echo "Sueldo del Empleado: " . $empleado->calcularSueldo() . "€<br>";
// Debería mostrar también si debe pagar impuestos basándose en su sueldo y su edad (20 años)
echo "¿Debe pagar impuestos?: " . ($empleado->debePagarImpuestos() ? "Sí" : "No") . "<br><br>";

?>