<?php

require_once 'request/nuevoRequest.php';
require_once 'responses/nuevoResponse.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$m = 'El jugador debe ser mayor de edad';

$r = new NuevoResponse();
$r->IsOk = true;


if ($req->Edad < 18) {
    $r->Mensajes[] = $m . '<br>';
    $r->IsOk = false;
}

if ($req->Puesto != 'Delantero' and $req->Puesto != 'Defensor' and $req->Puesto != 'Arquero' and $req->Puesto != 'Mediocampista') {
    $r->Mensajes[] = 'El puesto ' . $req->Puesto . ' no existe';
    $r->IsOk = false;
}
