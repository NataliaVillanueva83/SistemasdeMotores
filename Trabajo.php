<?php  
require_once 'Cliente.php';
require_once 'Maquina.php';

class Trabajo {
    private static $ultimoId = 0;
    private  $idTrabajo;
    private  $descripcion;
    private  $fecha;
    private Maquina $maquina;
    private Cliente $cliente; // Agregado para relacionar con Cliente

    //constructor
    public function __construct( $descripcion, $fecha, Maquina $maquina, Cliente $cliente) {
       
        Trabajo::$ultimoId++;
        $this->idTrabajo = Trabajo::$ultimoId;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->maquina = $maquina;
        $this->cliente = $cliente; // Asignar cliente al trabajo
        $this->cliente->agregarTrabajo($this); // Agregar el trabajo al cliente
    }




    // Getters y Setters
  public function getIdTrabajo() {
        return $this->idTrabajo;
    }
    public function getFecha() {
        return $this->fecha;
    }


    public function getDescripcion() {
        return $this->descripcion;
    }


    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getMaquina() {
        return $this->maquina;
    }
    public function setMaquina(Maquina $maquina) {
        $this->maquina = $maquina;  
    }
 /*public function getSerieMotor() {
        return $this->serieMotor;
    }
    public function setSerieMotor($serieMotor) {
        $this->serieMotor = $serieMotor;
    }   */
    public function __toString(): string {
        $maquinaInfo = $this->maquina ? "Maquina: " . $this->maquina->getNombre() : "Sin maquina asignada";
        return "Trabajo ID: " . $this->idTrabajo . 
               ", Descripcion: " . $this->descripcion . 
               ", Fecha: " . $this->fecha->format('Y-m-d') . 
               ", " . $maquinaInfo;
    }
}