<?php  
class Maquina {
    private static $ultimoId = 0;
    private $idMaquina; 
    private $nombre;
    private $modelo;
    //private array $motores = []; //solo agrego el numero de serie del motor


    // Constructor
      public function __construct( $nombre, $modelo) {
        Maquina::$ultimoId++;
        $this->idMaquina = Maquina::$ultimoId;
        $this->nombre = $nombre;
        $this->modelo = $modelo;
      }
    // Getters y Setters// Getters
    public function getIdMaquina() {
        return $this->idMaquina;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getModelo() {
        return $this->modelo;
    }

  


    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }


   /* public function agregarMotor($numeroSerie) {
        $this->motores[] = $numeroSerie;
    }

    public function agregarMotores (array $numerosSerie) {
        foreach ($numerosSerie as $numero) {
            $this->agregarMotor($numero);
        }
        }
    
    public function getMotores(): array {
        return $this->motores;
    } **/

    public function __toString(): string {
        return "Maquina ID: " . $this->idMaquina . 
               ", Nombre: " . $this->nombre . 
               ", Modelo: " . $this->modelo . ;
    
    }
}