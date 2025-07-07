<?php

class Db{
    private $clientes = [];
    private $trabajos = [];


    public function  agregarCliente(Cliente $cliente) {
        $this->clientes[] = $cliente;

    }
    public function getClientes(): array {
        return $this->clientes;
    }

    public function getTrabajos(): array {
        return $this->trabajos;
    }

    public function agregarTrabajo(Trabajo $trabajo): void {
        $this->trabajos[] = $trabajo;
    }
    function buscarClientePorNombre($nombre){
        
        foreach($this->clientes as $cliente) {
                if ($cliente->getNombre() == $nombre) {
                    return $cliente;
                }
            }
            return null;
        

    }
    public function buscarIndiceClientePorNombre(string $nombre){
        $i = 0;
        foreach ($this->clientes as  $cliente) {
            if ($cliente->getNombre() === $nombre) {
                return $i;
            }
        }
        return null;
    }
    function buscarTrabajoPorCliente(Cliente $cliente) {
        $trabajosCliente = [];
        foreach ($this->trabajos as $trabajo) {
            if ($trabajo->getCliente()->getId() == $cliente->getId()) {
                $trabajosCliente[] = $trabajo;
            }
        }
        return $trabajosCliente;
    }
    function buscarTrabajoPorId($idTrabajo) {
        foreach ($this->trabajos as $trabajo) {
            if ($trabajo->getIdTrabajo() == $idTrabajo) {
                return $trabajo;
            }
        }
        return null;
    }
    function buscarTrabajoPorIdPorIndice($idTrabajo) {
        $i = 0;
        foreach ($this->trabajos as $trabajo) {
            if ($trabajo->getIdTrabajo() == $idTrabajo) {
                return $i;
            }
            $i++;
        }
        return null;
    }
}
