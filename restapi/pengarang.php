<?php
    require_once "../method/mPengarang.php";
    $pengarang = new Pengarang();
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch ($request_method) {
        case 'GET':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $pengarang->getPengarangId($id);
            }else{
                $pengarang->getPengarang();
            }
            break;
        case 'POST':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $pengarang->updatePengarang($id);
            }else{
                $pengarang->insertPengarang();
            }
            break;
        case 'DELETE':
            $id = intval($_GET['id']);
            $pengarang->deletePengarang($id);
            break;
        default:
            header('HTTP/1.1 405 Method Not Allowed');
    }

?>