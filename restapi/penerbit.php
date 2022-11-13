<?php
    require_once "../method/mPenerbit.php";
    $penerbit = new Penerbit();
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch ($request_method) {
        case 'GET':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $penerbit->getPenerbitId($id);
            }else{
                $penerbit->getPenerbit();
            }
            break;
        case 'POST':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $penerbit->updatePenerbit($id);
            }else{
                $penerbit->insertPenerbit();
            }
            break;
        case 'DELETE':
            $id = intval($_GET['id']);
            $penerbit->deletePenerbit($id);
            break;
        default:
            header('HTTP/1.1 405 Method Not Allowed');
    }

?>