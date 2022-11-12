<?php
    require_once "../method/mKatalog.php";
    $katalog = new Katalog();
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch ($request_method) {
        case 'GET':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $katalog->getKatalogId($id);
            }else{
                $katalog->getKatalog();
            }
            break;
        case 'POST':
            if(!empty($_GET['id'])){
                $id = intval($_GET['id']);
                $katalog->updateKatalog($id);
            }else{
                $katalog->insertKatalog();
            }
            break;
        case 'DELETE':
            $id = intval($_GET['id']);
            $katalog->deleteKatalog($id);
            break;
        default:
            header('HTTP/1.1 405 Method Not Allowed');
    }

?>