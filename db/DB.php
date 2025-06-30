<?php
require_once 'cliente/Cliente.php';
require_once 'maquina/maquina.php';
require_once 'trabajo/Trabajo.php';
class db{
    private $clientes = [Cliente::class];
    private $trabajos = [Trabajo::class];

    function  agregarCliente(Cliente $cliente) {
        $this->clientes[] = $cliente;

    }
    function getClientes () {
        return $this->clientes;
    
    }
    function getTrabajos (){
        return $this-> trabajos;

    }
    function agregarTrabajo(Trabajo $trabajo){

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
    function buscarIndiceClientePorNombre($nombre){
            $indice = 0;
            foreach ($this->clientes as $cliente) {
                if ($ciudad->getNombre() == $nombre) {
                    return $indice;
                }
                $indice++;
            }
            return null;

    }
}
