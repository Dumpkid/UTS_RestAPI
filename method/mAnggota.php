<?php

require_once "../config/database.php";

class Anggota{

    function getAnggota(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $query = $conn->query("SELECT * FROM dataanggota");
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
    
    function getAnggotaId($id=0){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $query = "SELECT * FROM dataanggota";
        if($id !=0){
            $query .=" WHERE id_anggota = ".$id." LIMIT 1";
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
    
    public function insertAnggota(){
        global $conn;
        $arrcheckpost = array(
            'nama' => '',
            'tanggal_lahir' => '',
            'jenis_kelamin' => '',
            'alamat' => '',
            'email' => '',
            'telpon' => '',
            'username' => '',
            'password' => '',
        );
        
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($conn, "INSERT INTO dataanggota SET
            nama ='$_POST[nama]',
            tanggal_lahir = '$_POST[tanggal_lahir]',
            jenis_kelamin = '$_POST[jenis_kelamin]',
            alamat = '$_POST[alamat]',
            email = '$_POST[email]',
            telpon = '$_POST[telpon]',
            username = '$_POST[username]',
            passwd = '$_POST[password]'
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
                'message' => 'Parametes Do Not Match'
            );
            http_response_code(400);
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    function updateAnggota($id){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $arrcheckpost = array(
            'nama' => '',
            'tanggal_lahir' => '',
            'jenis_kelamin' => '',
            'alamat' => '',
            'email' => '',
            'telpon' => '',
            'username' => '',
            'password' => '',
        );
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($conn, "UPDATE dataanggota SET
            nama ='$_POST[nama]',
            tanggal_lahir = '$_POST[tanggal_lahir]',
            jenis_kelamin = '$_POST[jenis_kelamin]',
            alamat = '$_POST[alamat]',
            email = '$_POST[email]',
            telpon = '$_POST[telpon]',
            username = '$_POST[username]',
            passwd = '$_POST[password]'
            WHERE id_anggota ='$id'
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
    
    function deleteAnggota($id){
    
        global $conn;
        $query = "DELETE FROM dataanggota WHERE id_anggota =".$id;
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