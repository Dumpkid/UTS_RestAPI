<?php
    require_once "../method/mRak.php";
    $rak = new Rak();
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch ($request_method) {
        case 'GET':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $rak->getRakId($id);
            }else{
                $rak->getRak();
            }
            break;
        case 'POST':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $rak->updateRak($id);
            }else{
                $rak->insertRak();
            }
            break;
        case 'DELETE':
            $id = intval($_GET['id']);
            $rak->deleteRak($id);
            break;
        default:
            header('HTTP/1.1 405 Method Not Allowed');
    }

?>