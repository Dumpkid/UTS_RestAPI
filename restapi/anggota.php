<?php
    require_once "../method/mAnggota.php";
    $anggota = new Anggota();
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch ($request_method) {
        case 'GET':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $anggota->getAnggotaId($id);
            }else{
                $anggota->getAnggota();
            }
            break;
        case 'POST':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $anggota->updateAnggota($id);
            }else{
                $anggota->insertAnggota();
            }
            break;
        case 'DELETE':
            $id = intval($_GET['id']);
            $anggota->deleteAnggota($id);
            break;
        default:
            header('HTTP/1.1 405 Method Not Allowed');
    }

?>