<?php
require_once "312Trabajador.php";

class Gerente312 extends Trabajador312{

    
    public function __construct(
        string $nombre,
        string $apellido,
        int $edad,
        array $telefonos,
        protected float $salario
    )
    {
        parent::__construct($nombre, $apellido, $edad, $telefonos);
    }





    #[Override]
    public function calcularSueldo() : float 
    {
        return $this->salario + (($this->salario*$this->edad)/100);
    }
}


// Pasamos: Nombre, Apellido, Edad, Array de teléfonos, Salario base
$gerente = new Gerente312("Ana", "Martínez", 50, [655444333, 911222333], 3000.0);

echo "Sueldo del Gerente: " . $gerente->calcularSueldo() . "€<br>";
// Debería calcular si paga impuestos (mayor de 21 años y sueldo > 3333)
echo "¿Debe pagar impuestos?: " . ($gerente->debePagarImpuestos() ? "Sí" : "No") . "<br>";
?>