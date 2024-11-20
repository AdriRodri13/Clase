<?php

class CintaVideo extends Soporte
{
    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        private float $duracion
    )
    {
        parent::__construct($titulo, $numero, $precio);
    }

    public function muestraResumen()
    {
        parent::muestraResumen();
        echo 'Duracion: ' . $this->duracion . ' minutos <br>';
    }


}