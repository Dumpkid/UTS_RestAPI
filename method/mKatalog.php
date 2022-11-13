<?php

require_once "../config/database.php";

class Katalog{

    function getKatalog(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $query = $conn->query("SELECT * FROM datakatalog");
        $check = mysqli_num_rows($query);
        if($check == 0){
            $response = array(
                'status' => true,
                'message' => 'Data Anggota Kosong'
            );
            http_response_code(204);
        }else{
            while($row = mysqli_fetch_object($query)){
                $data[] = $row;
            }
            $response = array(
                'status' => true,
                'message' => 'Get Data Success',
                'data' => $data
            );
            http_response_code(200);
        }
        echo json_encode($response);
    }
    
    function getKatalogId($id=0){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $query = "SELECT * FROM datakatalog";
        if($id !=0){
            $query .=" WHERE id_katalog = ".$id." LIMIT 1";
        }
        $data = array();
        $result = $conn->query($query);
        while($row = mysqli_fetch_object($result)){
            $data[] = $row;
        }
        if($data){
            $response = array(
                'status' => true,
                'message' => 'Get Data Success',
                'data' => $data
            );
            http_response_code(200);
        }else{
            $response = array(
                'status' => false,
                'message' => 'Data tidak ditemukan'
            );
            http_response_code(404);
        }
        echo json_encode($response);
    }
    
    public function insertKatalog(){
        global $conn;
        $arrcheckpost = array(
            'judul' => '',
            'pengarang' => '',
            'jenis_buku' => '',
            'status_pinjam' => '',
        );
        
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($conn, "INSERT INTO datakatalog SET
            judul ='$_POST[judul]',
            pengarang = '$_POST[pengarang]',
            jenis_buku = '$_POST[jenis_buku]',
            status_pinjam = '$_POST[status_pinjam]'
            ");
    
            if($result){
                $response = array(
                    'status' => true,
                    'message' => 'Add Data Success'
                );
                http_response_code(201);
            }else{
                $response = array(
                    'status' => false,
                    'message' => 'Add Data Failed'
                );
            }
        }else{
            $response = array(
                'status' => false,
                'message' => 'Parameter Do Not Match'
            );
            http_response_code(400);
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    function updateKatalog($id){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $arrcheckpost = array(
            'judul' => '',
            'pengarang' => '',
            'jenis_buku' => '',
            'status_pinjam' => '',
        );
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($conn, "UPDATE datakatalog SET
            judul ='$_POST[judul]',
            pengarang = '$_POST[pengarang]',
            jenis_buku = '$_POST[jenis_buku]',
            status_pinjam = '$_POST[status_pinjam]'
            WHERE id_katalog ='$id'
            ");
    
            if($result){
                $response = array(
                    'status' => true,
                    'message' => 'Update Data Success'
                );
                http_response_code(201);
            }else{
                $response = array(
                    'status' => false,
                    'message' => 'Update Data Failed'
                );
                http_response_code(400);
                
            }
        }else{
            $response = array(
                'status' => false,
                'message' => 'Parameter Do Not Match'
            );
            http_response_code(400);
            
        }
        echo json_encode($response);
    }
    
    function deleteKatalog($id){
    
        global $conn;
        $query = "DELETE FROM datakatalog WHERE id_katalog =".$id;
        if(mysqli_query($conn, $query)){
            $response = array(
                'status' => true,
                'message' => 'Delete Data Success'
            );
            http_response_code(200);
        }else{
            $response = array(
                'status' => false,
                'message' => 'Delete Data Failed'
            );
            http_response_code(404);
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    }

?>