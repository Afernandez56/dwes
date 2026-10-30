<?php
class Persona310
{
    protected string $nombre;
    protected string $apellido;
    protected int $edad;

    public function __construct(string $nombre, string $apellido, int $edad)
    {
        $this->nombre = $nombre;
        $this->apellido =  $apellido;
        $this->edad = $edad;
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
     * Get the value of apellido
     */
    public function getApellido(): string
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     */
    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getNombreCompleto(): string
    {
        return "Tu nombre completo es " . $this->nombre . " " . $this->apellido;
    }

    public function __toString(): string{
        return $this->getNombreCompleto()." y tu edad es ".$this->edad;
    }
}


class Empleado extends Persona310
{

    protected static float $sueldo_Tope = 3333;
    protected static int $edadImpuestos = 21;

    public function __construct(
        string $nombre,
        string $apellido,
        int $edad,
        private float $sueldo,
        private array $telefono
    ) {
        parent::__construct($nombre, $apellido, $edad);
    }

    public static function getSueldo_Tope(): float
    {
        return self::$sueldo_Tope;
    }
    public static function setSueldo_Tope(float $nuevoTope): void
    {
        self::$sueldo_Tope = $nuevoTope;
    }

    public function getTelefono(): array
    {
        return $this->telefono;
    }

    public function setTelefono(array $telefono): self
    {
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

    public function pagaImpuestos(): bool
    {
        if ($this->edad <= 21) {
            return false;
        } else {
            return ($this->sueldo > self::$sueldo_Tope);
        }
    }

    public function anyadirTelefono(int $telefono): void
    {
        $this->telefono[] = $telefono;
    }

    public function listarTelefono(): string
    {
        $listaTelefonos = "";

        foreach ($this->telefono as $telefonos) {
            $listaTelefonos .=$telefonos . " | ";
        }
        return $listaTelefonos;
    }

    public function vaciarTelefonos(): void
    {
        $this->telefono = [];
    }
    public function getNombreCompleto(): string
    {
        return "Tu nombre completo es " . $this->nombre . " " . $this->apellido;
    }


    public static function toHtml(Persona $p): string
    {
        if ($p instanceof Empleado) {
            $texto =  "<p>Datos del empleado:" . $p->getNombreCompleto() . " y tu sueldo es: " . $p->getSueldo() . "</p>";
            $texto .= "<ol>";
            foreach ($p->getTelefono() as $telefono) {
                $texto .= "<li>" . $telefono . "</li>";
            }
            $texto .= "</ol>";
            return $texto;
        } else {
            return "No es un empleado";
        }
    }

        public function __toString(): string{
        return $this->getNombreCompleto().", tu edad es ".$this->edad.", tu sueldo es ".$this->sueldo. " y tienes como teléfono ".$this->listarTelefono();
    }
}
$p1 = new Persona310("Pepe", "Sánchez", 24);
$e1 = new Empleado("Luis", "Piedraita", 50, 10000, [6574493,7435793,860968]);
echo $p1."<br>";
echo $e1;
?>
