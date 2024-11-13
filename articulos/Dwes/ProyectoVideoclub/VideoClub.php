<?php
namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\CupoSuperadoException;
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\ClienteNoEncontradoException;

class Videoclub
{
    public function __construct(
        private string $nombre,
        private array $socios = [],
        private array $productos = []
    ) {}

    public function incluirSoporte(Soporte $producto)
    {
        $this->productos[] = $producto;
    }

    public function incluirCliente(Cliente $cliente)
    {
        $this->socios[] = $cliente;
    }

    public function alquilar(string $numeroCliente, string $numeroProducto): Videoclub
    {
        try {
            $cliente = $this->buscarCliente($numeroCliente);
            $producto = $this->buscarProducto($numeroProducto);

            $cliente->alquilar($producto);
            echo "Alquiler exitoso del soporte {$producto->getNumero()} al cliente {$cliente->getNumero()} <br>";

        } catch (CupoSuperadoException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        } catch (SoporteYaAlquiladoException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        } catch (SoporteNoEncontradoException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        } catch (ClienteNoEncontradoException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }

        return $this;
    }

    private function buscarCliente(string $numeroCliente): Cliente
    {
        foreach ($this->socios as $socio) {
            if ($socio->getNumero() == $numeroCliente) {
                return $socio;
            }
        }
        throw new ClienteNoEncontradoException("Cliente con número $numeroCliente no encontrado.");
    }

    private function buscarProducto(string $numeroProducto): Soporte
    {
        foreach ($this->productos as $producto) {
            if ($producto->getNumero() == $numeroProducto) {
                return $producto;
            }
        }
        throw new SoporteNoEncontradoException("Soporte con número $numeroProducto no encontrado.");
    }
}


