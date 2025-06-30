<?php
require_once ('Opcion.php');

class Menu {
    private $titulo;
    private $opciones = [];

    function __construct($titulo)
    {
        $this->titulo = $titulo;
    }

    function addOpcion ($opcion) {
        $this->opciones[] = $opcion;
    }

    private function mostrar() {
        system('clear');
        mostrar($this->titulo);
        mostrar(str_pad('', strlen($this->titulo), '-'));

        foreach ($this->opciones as $key => $opcion) {
            mostrar("\033[1;31m".$key."\033[0m"."-".$opcion->getNombre());
        }
    }

    function elegir() {
        $this->mostrar();
        do {
            $opcion = trim(fgets(STDIN));
            if (trim($opcion) == "") {
                echo "\033[1A";
            }
        } while (trim($opcion) == "");

        $operacion = $this->opciones[$opcion];
        return $operacion;        
    }

    static function getMenuPrincipal() {
        $menu = new Menu('Menu Principal');
        $menu->addOpcion( new Opcion('Salir', 'salir'));
        $menu->addOpcion( new Opcion('Clientes', 'clientes'));
        $menu->addOpcion( new Opcion('Trabajos', 'trabajos'));
        return $menu;
    }

    static function getMenuCiudades() {
        $menu2 = new Menu('Menu Clientes');
        $menu2->addOpcion( new Opcion('Salir', 'salir'));
        $menu2->addOpcion( new Opcion('Listar', 'listarClientes'));
        $menu2->addOpcion( new Opcion('Agregar', 'agregarCliente'));
        $menu2->addOpcion( new Opcion('Modificar', 'modificarCliente'));
        $menu2->addOpcion( new Opcion('Eliminar', 'eliminarCliente'));
        $menu2->addOpcion( new Opcion('Buscar', 'buscarCliente'));
        return $menu2;
    }
}