<?php


class Cliente {
    private static $ultimoId = 0;
    private $id;
    private $nombre;
    private $telefono;
    private $email;
    private $maquinas= [];
    private $trabajos= [];
    //constructor
  
    public function __construct( $nombre, $telefono, $email) {
        Cliente::$ultimoId++;
        $this->id = Cliente::$ultimoId;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;
       
    }

    //gettters y settters 
    public function getId() {
        return $this->id;
    }


    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getTelefono() {
        return $this->telefono;
    }
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }   
   
    public function agregarMaquina(Maquina $maquina) {
        $this->maquinas[] = $maquina;
    }
    public function getMaquinas(): array {
        return $this->maquinas;
    }


    public function agregarTrabajo(Trabajo $trabajo): void {
        $this->trabajos[] = $trabajo;
    }

      public function __toString(): string {
        return "Cliente: " . $this->nombre . 
               ", Teléfono: " . $this->telefono . 
               ", Email: " . $this->email;
    }
}