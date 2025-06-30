<?php 
class Cliente {
    static $ultimoId = 0;
    private $id;
    private $nombre;
    private $cuit;
    private $telefono;
    private $email;
    private $direccion;
    private $localidad;
    private $maquinas= [];
    //constructor
    /**
     * Constructor de la clase Cliente.
     *
     * @param string $nombre Nombre del cliente.
     * @param string $cuit CUIT del cliente.
     * @param string $telefono Teléfono del cliente.
     * @param string $email Email del cliente.
     * @param string $direccion Dirección del cliente.
     * @param string $localidad Localidad del cliente.
     */
    public function __construct($nombre, $cuit, $telefono, $email, $direccion, $localidad) {
        Cliente::$ultimoId++;
        $this->id = Cliente::$ultimoId;
        // Validación de parámetros
        $this->nombre = $nombre;
        $this->cuit = $cuit;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
    }

    //gettters y settters 
    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getCuit() {
        return $this->cuit;
    }
    public function setCuit($cuit) {
        $this->cuit = $cuit;
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
    public function getLocalidad(){
        return $this->localidad;
    }
    public function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function agregarMaquina(Maquina $maquina) {
        $this->maquinas[] = $maquina;
    }

    public function getMaquinas() {
        return $this->maquinas;
    }
    public function __toString() {
        return "Cliente: " . $this->nombre . 
               ", CUIT: " . $this->cuit . 
               ", Teléfono: " . $this->telefono . 
               ", Email: " . $this->email . 
               ", Dirección: " . $this->direccion . 
               ", Localidad: " . $this->localidad;
    }
}