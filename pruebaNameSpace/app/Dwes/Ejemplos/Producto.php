<?php
namespace Dwes\Ejemplos;

class Producto{
     public string $nombre;
     const IVA = 0.21;

        public function __construct(string $nombre)
        {
            $this->nombre =  $nombre;
        }

    public function muestra() : void {
        echo "<p>Prod:". $this->nombre ."</p>";
    }
}

?>