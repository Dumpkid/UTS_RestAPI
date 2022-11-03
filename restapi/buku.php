<?php
    require_once "../method/method.php";
    $buku = new Buku();
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch ($request_method) {
        case 'GET':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $buku->getBukuId($id);
            }else{
                $buku->getBuku();
            }
            break;
        case 'POST':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $buku->updateBuku($id);
            }else{
                $buku->insertBuku();
            }
            break;
        case 'DELETE':
            $id = intval($_GET['id']);
            $buku->deleteBuku($id);
            break;
        default:
            header('HTTP/1.1 405 Method Not Allowed');
    }

?>