<?php  
class maquina {
    private $id; //static Modificar!!!!
    private $nombre;
    private $modelo;
    private $idMotor;
    private Cliente $cliente;

    // Constructor
    public function __construct($id, $nombre, $modelo, $idMotor, Cliente $cliente) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->modelo = $modelo;
        $this->idMotor = $idMotor;
        $this->cliente = $cliente;
    }

    // Getters y Setters
    public function getId() {
        return