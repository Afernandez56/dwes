<?php 

require_once '308Persona.php';
class Empleado extends Persona308
{

protected static float $sueldo_Tope = 3333;

  public function __construct(  
         string $nombre,
         string $apellido,
        private float $sueldo,
        private array $telefono   
    ){
        parent::__construct($nombre, $apellido);
    }

    public static function getSueldo_Tope() : float{
        return self::$sueldo_Tope;
    }
    public static function setSueldo_Tope(float $nuevoTope) : void{
        self::$sueldo_Tope = $nuevoTope;
    }

        public function getTelefono(): array{
                return $this->telefono;
        }

        public function setTelefono(array $telefono): self{
            $this->telefono = $telefono;
            return $this;
        }
    
        /**
         * Get the value of sueldo
         */
        public function getSueldo(): float
        {
                return $this->sueldo;
        }

        /**
         * Set the value of sueldo
         */
        public function setSueldo(float $sueldo): self
        {
                $this->sueldo = $sueldo;

                return $this;
        }

    public function pagaImpuestos() : bool {
        return ($this->sueldo > self::$sueldo_Tope);
    }

    public function anyadirTelefono(int $telefono) : void{
            $this->telefono [] = $telefono;
    }
    
    public function listarTelefono() : string {
        $listaTelefonos = "";

        foreach($this->telefono as $telefonos){
            $listaTelefonos.= $telefonos."  ";
        }
        return $listaTelefonos;
    }

    public function vaciarTelefonos(): void {
        $this->telefono = [];
    }
    public function getNombreCompleto() : string {
        return "Tu nombre completo es ". $this->nombre . " " . $this->apellido;
    }
    

    public static function toHtml(Persona $p): string {
        if ($p instanceof Empleado){
        $texto =  "<p>Datos del empleado:" .$p->getNombreCompleto()." y tu sueldo es: ".$p->getSueldo() ."</p>";
        $texto.="<ol>";
           foreach ($p->getTelefono() as $telefono){ 
                $texto.="<li>".$telefono."</li>";
          }
        $texto.="</ol>";
        return $texto;
        }else{
            return "No es un empleado";
        }
        
    }

}

$empleado1 = new Empleado("Juan", "Perez", 2500, [600111222, 911223344]);
echo Empleado::toHtml($empleado1);
?>