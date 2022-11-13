<?php
    require_once "../method/mDenda.php";
    $denda = new Denda();
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch ($request_method) {
        case 'GET':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $denda->getDendaId($id);
            }else{
                $denda->getDenda();
            }
            break;
        case 'POST':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $denda->updateDenda($id);
            }else{
                $denda->insertDenda();
            }
            break;
        case 'DELETE':
            $id = intval($_GET['id']);
            $denda->deleteDenda($id);
            break;
        default:
            header('HTTP/1.1 405 Method Not Allowed');
    }

?>