<?php
    require_once "../method/mJenis_buku.php";
    $jenis_buku = new Jenis_buku();
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch ($request_method) {
        case 'GET':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $jenis_buku->getJenisBukuId($id);
            }else{
                $jenis_buku->getJenisBuku();
            }
            break;
        case 'POST':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $jenis_buku->updateJenisBuku($id);
            }else{
                $jenis_buku->insertJenisBuku();
            }
            break;
        case 'DELETE':
            $id = intval($_GET['id']);
            $jenis_buku->deleteJenisBuku($id);
            break;
        default:
            header('HTTP/1.1 405 Method Not Allowed');
    }

?>