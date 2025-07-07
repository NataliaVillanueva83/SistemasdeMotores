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

    mostrar("=== Agregar nuevo trabajo ===");

    $clienteNombre = leer("Nombre del cliente:");
    $cliente = $db->buscarClientePorNombre($clienteNombre);

    if ($cliente === null) {
        mostrar("Cliente no encontrado.");
        leer("Presione ENTER para continuar...");
        return;
    }

    
 $maquinas = $cliente->getMaquinas();
    if (empty($maquinas)) {
        mostrar("El cliente no tiene máquinas registradas.");
        leer("Presione ENTER para continuar...");
        return;
    }

  mostrar("Máquinas del cliente:");
    foreach ($maquinas as $i => $maq) {
        mostrar("[$i] " . $maq->getNombre() . " (" . $maq->getModelo() . ")");
    }

    $indiceMaq = leer("Ingrese el número de la máquina:");
    if (!isset($maquinas[$indiceMaq])) {
        mostrar("Maquina no encontrada.");
        leer("Presione ENTER para continuar...");
        return;
    }

    $maquinaSeleccionada = $maquinas[$indiceMaq];

   /*// Paso 4: Verificar que tenga motores
    $motores = $maquinaSeleccionada->getMotores();
    if (empty($motores)) {
        mostrar("La máquina no tiene motores registrados.");
        leer("Presione ENTER para continuar...");
        return;
    }


    mostrar("Motores disponibles (N° de serie):");
    foreach ($motores as $motorSerie) {
        mostrar("- $motorSerie");
    }

    $motorSeleccionado = leer("Ingrese el N° de serie del motor:");
    if (!in_array($motorSeleccionado, $motores)) {
        mostrar(" N° de serie no encontrado en esta máquina.");
        leer("Presione ENTER para continuar...");
        return;
    }*/
    $descripcion = leer("Descripción del trabajo:");

    $fechaInput = leer("Fecha del trabajo (YYYY-MM-DD):");
    $trabajo = new Trabajo($descripcion, $fechaInput, $maquinaSeleccionada, $cliente);
 

    $db->agregarTrabajo($trabajo);

    mostrar("Trabajo agregado correctamente:");
    mostrar($trabajo); 
    leer("\nPresione ENTER para continuar...");
}

    
function modificarCliente() {
    global $db;
    $nombre = leer("Ingrese el nombre del cliente a modificar:");
    $cliente = $db->buscarClientePorNombre($nombre);    
   
    if ($cliente === null) {
        mostrar( "Cliente no encontrado en la lista.");
        leer("\nPresione ENTER para continuar ...");
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
    $idTrabajo= leer("Ingrese el id del trabajo a modificar:");
    $trabajo = $db->buscarTrabajoPorId($idTrabajo;    
    if ($trabajo === null) {
        mostrar("Trabajo no encontrado.");
        leer("\nPresione ENTER para continuar ...");
        return;
    }
    $nuevaDescripcion = leer("Nueva descripcion:");
    $nuevaFecha = leer("Nueva fecha (YYYY-MM-DD):"); 

    $trabajo->setDescripcion($nuevaDescripcion);
    $trabajo->setFecha($nuevaFecha);    

    mostrar("Trabajo modificado: " . $trabajo);
    leer("\nPresione ENTER para continuar ...");
}
function eliminarCliente() {
    global $db;
    $nombre = leer("Ingrese el nombre del cliente a eliminar:");
    $cliente = $db->buscarClientePorNombre($nombre);    
    if ($cliente === null) {
        mostrar( "Cliente no encontrado en la lista.");
        leer("\nPresione ENTER para continuar ...");
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
    $idTrabajo = leer("Ingrese el id del trabajo a eliminar:");
    $trabajo = $db->buscarTrabajoPorId($descripcion);    
    if ($trabajo === null) {
        mostrar("Trabajo no encontrado.");
        leer("\nPresione ENTER para continuar ...");
        return;
    }
    $indice = $db->buscarTrabajoPorIdPorIndice($idTrabajo);
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
function trabajos() {
    $menu = Menu::getMenuTrabajos();
    $opcion = $menu->elegir();
    while ($opcion->getNombre() != 'Salir') {

        $funcion = $opcion->getFuncion();
        call_user_func($funcion);

        $opcion = $menu->elegir();    

    }
}


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