<?php
    require_once('DB.php');
    require_once('Ciudad.php');
    require_once('Persona.php');

    $db = new DB();
    $db->agregarCliente(new Cliente("Juan Perez", "20-12345678-9", "1234567890", "juanperez@example.com", "Calle Falsa 123", "Tandil"));
    