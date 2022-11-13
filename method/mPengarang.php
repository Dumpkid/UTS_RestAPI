<?php

require_once "../config/database.php";

class Pengarang{

    function getPengarang(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $query = $conn->query("SELECT * FROM datapengarang");
        $check = mysqli_num_rows($query);
        if($check == 0){
            $response = array(
                'status' => true,
                'message' => 'Data Pengarang Kosong'
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
    
    function getPengarangId($id=0){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $query = "SELECT * FROM datapengarang";
        if($id !=0){
            $query .=" WHERE id_pengarang = ".$id." LIMIT 1";
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
    
    public function insertPengarang(){
        global $conn;
        $arrcheckpost = array(
            'pengarang' => '',
        );
        
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($conn, "INSERT INTO datapengarang SET
            pengarang ='$_POST[pengarang]'
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
    
    function updatePengarang($id){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $arrcheckpost = array(
            'pengarang' => '',
        );
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($conn, "UPDATE datapengarang SET
            pengarang ='$_POST[pengarang]'
            WHERE id_pengarang ='$id'
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
    
    function deletePengarang($id){
    
        global $conn;
        $query = "DELETE FROM datapengarang WHERE id_pengarang =".$id;
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