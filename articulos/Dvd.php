<?php

class Dvd extends Soporte
{
    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        public string $idiomas,
        private string $formatPantalla
    )
    {
        parent::__construct($titulo, $numero, $precio);
    }

    public function muestraResumen()
    {
        parent::muestraResumen();
        echo 'idioma: ' . $this->idiomas . '<br>';
        echo 'formatPantalla: ' . $this->formatPantalla . '<br>';
    }


}