<?php
   require_once 'Cliente.php';
   require_once 'Maquina.php';
   require_once 'Trabajo.php';
   require_once 'DB.php';
    $db = new DB();
    $cliente1= (new Cliente("Juan Perez", "2494653475", "juanperez@gmail.com" ));
    $cliente2= (new Cliente("Maria Lopez", "2494123456", "lopezmaria@gmail.com" ));
    $cliente3=(new Cliente("Carlos Gomez", "2494652875", "gomezc@gmail.com"));
      $db->agregarCliente($cliente1);
      $db->agregarCliente($cliente2);
      $db->agregarCliente($cliente3);
      $maquina1 = (new Maquina("Excavadora", "CAT 320"));
      $maquina2 = (new Maquina("Buldoser", "CAT D6"));
      $maquina3 = (new Maquina("Retroexcavadora", "CAT 420"));
     /* $maquina1->agregarMotor("123456");
      $maquina1->agregarMotor("654321");
      $maquina2->agregarMotor("789012");
      $maquina3->agregarMotor("345678");*/
      $cliente1->agregarMaquina($maquina1);
      $cliente2->agregarMaquina($maquina2);
      $cliente3->agregarMaquina($maquina3);
      $trabajo1 = (new Trabajo("Cambio de aceite", "21-03-2025", $maquina1, $cliente1));
      $trabajo2 = (new Trabajo("Reparacion de motor", "14-05-2025", $maquina2, $cliente2));
      $trabajo3 = (new Trabajo("Mantenimiento general", "16-06-2024", $maquina3, $cliente3));
      $trabajo4 = (new Trabajo("Cambio de filtros", "25-01-2025", $maquina1, $cliente1));
$db->agregarTrabajo($trabajo1);
$db->agregarTrabajo($trabajo2);
$db->agregarTrabajo($trabajo3);     
$db->agregarTrabajo($trabajo4);
   
