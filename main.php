<?php

require_once 'librerias/util.php';
require_once 'librerias/menu.php';
require_once 'db/LoadDatos.php';
require_once 'db/DB.php';   


function listarClientes() {
    global $db;

    $clientes = $db->getClientes();
    foreach ($clientes as $cliente) {
        echo $cliente; echo ("\n");
    }

    mostrar("Cantidad de clientes:".count($db->getClientes()));
    leer("\nPresione ENTER para continuar ...");
}
function listarTrabajos() {
    global $db;

    $trabajos = $db->getTrabajos();
    foreach ($trabajos as $trabajo) {
        echo $trabajo; echo ("\n");
    }

    mostrar("Cantidad de trabajos:".count($db->getTrabajos()));
    leer("\nPresione ENTER para continuar ...");
}
function agregarCliente() {
    global $db;

    mostrar("Agregar nuevo cliente");

    $nombre = leer("Nombre:");
    $nombre = ucwords($nombre);
    $telefono = leer("Telefono:");
    $telefono= ucwords($telefono);
    $email = leer("Email:");
    $email= ucwords($email);


    $cliente = new Cliente($nombre, $telefono, $email);
    $db->agregarCliente($cliente);

    mostrar("Se agrego un nuevo cliente: " . $cliente);
    leer("\nPresione ENTER para continuar ...");
}
function agregarTrabajo() {
    global $db;

    mostrar("Agregar nuevo trabajo");

    $clienteNombre = leer("Nombre del cliente:");
    $cliente = $db->buscarClientePorNombre($clienteNombre);
    
    if ($cliente === null) {
        mostrar("Cliente no encontrado.");
        return;
    }

    $descripcion = leer("Descripcion del trabajo:");
    $fecha = leer("Fecha del trabajo (YYYY-MM-DD):");
    
    $trabajo = new Trabajo($cliente, $descripcion, $fecha);
    $db->agregarTrabajo($trabajo);

    mostrar("Se agrego un nuevo trabajo: " . $trabajo);
    leer("\nPresione ENTER para continuar ...");
}
function modificarCliente() {
    global $db;
    $nombre = leer("Ingrese el nombre del cliente a modificar:");
    $cliente = $db->buscarClientePorNombre($nombre);    
    if ($cliente === null) {
        mostrar("Cliente no encontrado.");
        return;
    }
    $nuevoNombre = leer("Nuevo nombre:");
    $nuevoTelefono = leer("Nuevo telefono:");
    $nuevoEmail = leer("Nuevo email:"); 

    $cliente->setNombre($nuevoNombre);
    $cliente->setTelefono($nuevoTelefono);
    $cliente->setEmail($nuevoEmail);    


    mostrar("Cliente modificado: " . $cliente);
    leer("\nPresione ENTER para continuar ...");
}   
function modificarTrabajo() {
    global $db;
    $descripcion = leer("Ingrese la descripcion del trabajo a modificar:");
    $trabajo = $db->buscarTrabajoPorDescripcion($descripcion);    
    if ($trabajo === null) {
        mostrar("Trabajo no encontrado.");
        return;
    }
    $nuevaDescripcion = leer("Nueva descripcion:");
    $nuevaFecha = leer("Nueva fecha (YYYY-MM-DD):"); 

    $trabajo->setDescripcion($nuevaDescripcion);
    $trabajo->setFecha(new DateTime($nuevaFecha));    

    mostrar("Trabajo modificado: " . $trabajo);
    leer("\nPresione ENTER para continuar ...");
}
function eliminarCliente() {
    global $db;
    $nombre = leer("Ingrese el nombre del cliente a eliminar:");
    $cliente = $db->buscarClientePorNombre($nombre);    
    if ($cliente === null) {            
        mostrar("Cliente no encontrado.");
        return;
    }   
    $indice = $db->buscarIndiceClientePorNombre($nombre);
    if ($indice !== null) {
        unset($db->getClientes()[$indice]);
        mostrar("Cliente eliminado: " . $cliente);
    } else {
        mostrar("No se pudo eliminar el cliente.");
    }
    leer("\nPresione ENTER para continuar ...");
}
function eliminarTrabajo() {
    global $db;
    $descripcion = leer("Ingrese la descripcion del trabajo a eliminar:");
    $trabajo = $db->buscarTrabajoPorDescripcion($descripcion);    
    if ($trabajo === null) {
        mostrar("Trabajo no encontrado.");
        return;
    }
    $indice = $db->buscarIndiceTrabajoPorDescripcion($descripcion);
    if ($indice !== null) {
        unset($db->getTrabajos()[$indice]);
        mostrar("Trabajo eliminado: " . $trabajo);
    } else {
        mostrar("No se pudo eliminar el trabajo.");
    }
    leer("\nPresione ENTER para continuar ...");
}
function buscarCliente() {
    global $db;
    $nombre = leer("Ingrese el nombre del cliente a buscar:");
    $cliente = $db->buscarClientePorNombre($nombre);
    
    if ($cliente !== null) {
        mostrar("Cliente encontrado: " . $cliente);
    } else {
        mostrar("Cliente no encontrado.");
    }
    leer("\nPresione ENTER para continuar ...");
}
function buscarTrabajo() {
    global $db;
    $idTrabajo = leer("Ingrese el id  del trabajo a buscar:");
    $trabajo = $db->buscarTrabajoPorId($idTrabajo);          
    if ($trabajo !== null) {
        mostrar("Trabajo encontrado: " . $trabajo);
    } else {
        mostrar("Trabajo no encontrado.");
    }
    leer("\nPresione ENTER para continuar ...");
}       
function salir() {
    mostrar("Saliendo del sistema...");
    exit;
}       

function clientes() {
    $menu = Menu::getMenuClientes();
    $opcion = $menu->elegir();
    while ($opcion->getNombre() != 'Salir') {

        $funcion = $opcion->getFuncion();
        call_user_func($funcion);

        $opcion = $menu->elegir();    

    }
}

function trabajo() {
    mostrar('Gestionar personas');
    die;
}

// Personas
// Ciudades
// Personas tienen una ciudad de nacimiento

mostrar("Sistema de Gestión de Mantenimiento de Motores");
mostrar("==============================");
mostrar("(C) 2025");


$menu = Menu::getMenuPrincipal();
$opcion = $menu->elegir();

while ($opcion->getNombre() != 'Salir') {

    $funcion = $opcion->getFuncion();
    call_user_func($funcion);

    $opcion = $menu->elegir();    

}