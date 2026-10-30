<?php 

require_once "312Persona.php";
abstract class Trabajador312 extends Persona312{
    protected static float $sueldo_Tope = 3333;


    public function __construct(
        string $nombre,
        string $apellido,
        int $edad,
        protected array $telefonos)
    {
        parent::__construct($nombre, $apellido, $edad);
    }

    
    abstract public function calcularSueldo();

    public function debePagarImpuestos() : bool{
         if ($this->edad <=21){
            return false;
        }else{
            return ($this->calcularSueldo() > self::$sueldo_Tope);
        }
        
    }
    






}
?>