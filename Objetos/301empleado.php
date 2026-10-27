<?php 
class Empleado {

 public function __construct(  
        private string $nombre,
        private string $apellido,
        private float $sueldo   
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

    public function getNombreCompleto() : string {
        return "Tu nombre completo es: ". $this->nombre . " " .$this->apellido;
    }

    public function pagaImpuestos() : bool {
        return ($this->sueldo > 3333);
    }
  }  

  $empleado = new Empleado("Juan", "Pérez", 1500.50);
  echo $empleado->getNombre();
  echo $empleado->pagaImpuestos();

?>