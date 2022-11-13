<?php

require_once "../config/database.php";

class Pinjam{

    function getPinjam(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $query = $conn->query("SELECT * FROM datapinjam");
        $check = mysqli_num_rows($query);
        if($check == 0){
            $response = array(
                'status' => true,
                'message' => 'Data Pinjam Kosong'
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
    
    function getPinjamId($id=0){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $query = "SELECT * FROM datapinjam";
        if($id !=0){
            $query .=" WHERE id_pinjam = ".$id." LIMIT 1";
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
    
    public function insertPinjam(){
        global $conn;
        $arrcheckpost = array(
            'pinjam_id' => '',
            'anggota_id' => '',
            'buku_id' => '',
            'tanggal_pinjam' => '',
            'lama_pinjam' => '',
            'tanggal_kembali' => '',
            'denda_id' => '',
            'status_pinjam' => '',
        );
        
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($conn, "INSERT INTO datapinjam SET
            pinjam_id ='$_POST[pinjam_id]',
            anggota_id ='$_POST[anggota_id]',
            buku_id = '$_POST[buku_id]',
            tanggal_pinjam = '$_POST[tanggal_pinjam]',
            lama_pinjam = '$_POST[lama_pinjam]',
            tanggal_kembali = '$_POST[tanggal_kembali]',
            denda_id = '$_POST[denda_id]',
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
    
    function updatePinjam($id){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        global $conn;
        $arrcheckpost = array(
            'pinjam_id' => '',
            'anggota_id' => '',
            'buku_id' => '',
            'tanggal_pinjam' => '',
            'lama_pinjam' => '',
            'tanggal_kembali' => '',
            'denda_id' => '',
            'status_pinjam' => '',
        );
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($conn, "UPDATE datapinjam SET
            pinjam_id ='$_POST[pinjam_id]',
            anggota_id ='$_POST[anggota_id]',
            buku_id = '$_POST[buku_id]',
            tanggal_pinjam = '$_POST[tanggal_pinjam]',
            lama_pinjam = '$_POST[lama_pinjam]',
            tanggal_kembali = '$_POST[tanggal_kembali]',
            denda_id = '$_POST[denda_id]',
            status_pinjam = '$_POST[status_pinjam]'
            WHERE id_pinjam ='$id'
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
    
    function deletePinjam($id){
    
        global $conn;
        $query = "DELETE FROM datapinjam WHERE id_pinjam =".$id;
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