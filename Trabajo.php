<?php  
require_once 'Cliente.php';
require_once 'Maquina.php';

class Trabajo {
    private static $ultimoId = 0;
    private  $idTrabajo;
    private  $descripcion;
    private DateTime $fecha;
    private Maquina $maquina;

    //constructor
    public function __construct( $descripcion, DateTime $fecha, ?Maquina $maquina = null) {
        Trabajo::$ultimoId++;
        $this->idTrabajo = Trabajo::$ultimoId;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->maquina = $maquina;
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
}