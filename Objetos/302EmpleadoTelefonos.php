<?php
class Empleado
{


  public function __construct(  
        private string $nombre,
        private string $apellido,
        private float $sueldo,
        private array $telefono   
    ){}

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellido(): string {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self {
        $this->apellido = $apellido;
        return $this;
    }

    public function getSueldo(): float {
        return $this->sueldo;
    }

    public function setSueldo(float $sueldo): self {
        $this->sueldo = $sueldo;
        return $this;
    }
            /**
         * Get the value of telefono
         */
        public function getTelefono(): array
        {
                return $this->telefono;
        }

        /**
         * Set the value of telefono
         */
        public function setTelefono(array $telefono): self
        {
                $this->telefono = $telefono;

                return $this;
        }


    public function getNombreCompleto() : string {
        return "Tu nombre completo es: ". $this->nombre . " " . $this->apellido;
    }

    public function pagaImpuestos() : bool {
        return ($this->sueldo > 3333);
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


}


$empleado = new Empleado("Carlos", "Mendoza", 3500.50, [600111222, 611333444]);

$empleado = new Empleado("Carlos", "Mendoza", 3500.50, [600111222, 611333444]);

echo "--- DATOS INICIALES ---\n";
// Probar el nombre completo
echo $empleado->getNombreCompleto() . "\n"; 

// Probar si paga impuestos (Sueldo: 3500.50 > 3333 -> Debería decir "SÍ")
echo "¿Paga impuestos?: " . ($empleado->pagaImpuestos() ? "SÍ" : "NO") . "\n";

// Listar los teléfonos iniciales
echo "Teléfonos: " . $empleado->listarTelefono() . "\n\n";


echo "--- MODIFICANDO DATOS (Setters y Métodos) ---\n";
// Modificar el sueldo usando la fluidez de las funciones (return $this)
$empleado->setSueldo(2800.00);
echo "Nuevo sueldo: " . $empleado->getSueldo() . " €\n";
echo "¿Paga impuestos ahora?: " . ($empleado->pagaImpuestos() ? "SÍ" : "NO") . "\n";

// Añadir un nuevo teléfono a la lista
$empleado->anyadirTelefono(622555666);
echo "Lista con el nuevo teléfono: " . $empleado->listarTelefono() . "\n\n";


echo "--- PROBANDO EL VACIADO ---\n";
// Vaciar la lista completa de teléfonos
$empleado->vaciarTelefonos();
echo "Lista después de vaciar: '" . $empleado->listarTelefono() . "' (Debería estar vacío)\n";