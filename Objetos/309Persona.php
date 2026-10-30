<?php
class Persona309{
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
    
    public function getNombreCompleto() : string {
        return "Tu nombre completo es ". $this->nombre . " " . $this->apellido;
    }

  
}

    
?>