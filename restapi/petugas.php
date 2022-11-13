<?php
    require_once "../method/mPetugas.php";
    $petugas = new Petugas();
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch ($request_method) {
        case 'GET':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $petugas->getPetugasId($id);
            }else{
                $petugas->getPetugas();
            }
            break;
        case 'POST':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $petugas->updatePetugas($id);
            }else{
                $petugas->insertPetugas();
            }
            break;
        case 'DELETE':
            $id = intval($_GET['id']);
            $petugas->deletePetugas($id);
            break;
        default:
            header('HTTP/1.1 405 Method Not Allowed');
    }

?>