<?php

require_once "../config/database.php";

class Rak{

    function getRak(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $query = $conn->query("SELECT * FROM datarak");
        $check = mysqli_num_rows($query);
        if($check == 0){
            $response = array(
                'status' => true,
                'message' => 'Data Rak Kosong'
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
    
    function getRakId($id=0){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $query = "SELECT * FROM datarak";
        if($id !=0){
            $query .=" WHERE id_rak = ".$id." LIMIT 1";
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
    
    public function insertRak(){
        global $conn;
        $arrcheckpost = array(
            'nama_rak' => '',
        );
        
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($conn, "INSERT INTO datarak SET
            nama_rak ='$_POST[nama_rak]'
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
    
    function updateRak($id){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $arrcheckpost = array(
            'nama_rak' => '',
        );
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($conn, "UPDATE datarak SET
            nama_rak ='$_POST[nama_rak]'
            WHERE id_rak ='$id'
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
    
    function deleteRak($id){
    
        global $conn;
        $query = "DELETE FROM datarak WHERE id_rak =".$id;
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