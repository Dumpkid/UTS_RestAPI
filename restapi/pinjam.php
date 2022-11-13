<?php
    require_once "../method/mPinjam.php";
    $pinjam = new Pinjam();
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch ($request_method) {
        case 'GET':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $pinjam->getPinjamId($id);
            }else{
                $pinjam->getPinjam();
            }
            break;
        case 'POST':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $pinjam->updatePinjam($id);
            }else{
                $pinjam->insertPinjam();
            }
            break;
        case 'DELETE':
            $id = intval($_GET['id']);
            $pinjam->deletePinjam($id);
            break;
        default:
            header('HTTP/1.1 405 Method Not Allowed');
    }

?>