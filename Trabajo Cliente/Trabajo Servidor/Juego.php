<?php

class Juego extends Soporte
{
    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        public string $consola,
        private int $minNumJugadores,
        private int $maxNumJugadores,
    )
    {
        parent::__construct($titulo, $numero, $precio);
    }

    public function muestraJugadoresPosibles(){
        if($this->minNumJugadores == 1 || $this->maxNumJugadores == 1){
            echo 'Juego para un jugador <br>';
        }elseif ($this->minNumJugadores == $this->maxNumJugadores){
            echo 'Juego para'. $this->minNumJugadores .' jugadores<br>';
        }else{
            echo 'juego desde'. $this->minNumJugadores .' hasta' .$this->maxNumJugadores .' jugadores<br>';
        }
    }

    public function muestraResumen()
    {
        parent::muestraResumen();
        echo 'consola: '.$this->consola.'<br>';
        $this->muestraJugadoresPosibles();
    }


}