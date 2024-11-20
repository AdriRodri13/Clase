<?php

abstract class Soporte implements Resumible
{
    const IVA = 21;
    public function __construct(
        public string $titulo,
        protected int $numero,
        private float $precio
    )
    {}

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getPrecioConIva():float{
        return $this->precio*self::IVA;
    }

    public function muestraResumen(){
        echo $this->titulo."<br>";
        echo $this->precio." (Sin Iva) <br>";
    }

}