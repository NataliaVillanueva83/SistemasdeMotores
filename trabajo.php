<?php  
require_once 'cliente.php';
require_once 'Maquina.php';

class Trabajo {
    private Cliente $cliente;
    private  $fecha;
    private Maquina $maquina; 
    private $idMotor; 
    private string $trabajoRealizado;


    // Constructor
    public function __construct(Cliente $cliente,  $fecha, Maquina $maquina,  $idMotor, string $trabajoRealizado = '') {
        $this->cliente = $cliente;
        $this->fecha = $fecha;
        $this->maquina = $maquina;
        $this->idMotor = $idMotor;
        $this->trabajoRealizado = $trabajoRealizado;
    }

    // Getters y Setters
  
    public function getFecha() {
        return $this->fecha;
    }


    public function getTrabajoRealizado() {
        return $this->trabajoRealizado;
    }


    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

  
    

    public function setTrabajoRealizado($trabajoRealizado) {
        $this->trabajoRealizado = $trabajoRealizado;
    }
    public function getCliente() {
        return $this->cliente;
    }
    public function setCliente(Cliente $cliente) {
        $this->cliente = $cliente;
    }
    public function getMaquina() {
        return $this->maquina;
    }
    public function setMaquina(Maquina $maquina) {
        $this->maquina = $maquina;  
    }
}