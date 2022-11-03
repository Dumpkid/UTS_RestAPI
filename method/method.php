<?php
    require_once "../config/database.php";
    class Buku{

        function getBuku(){
            global $conn;
            $query = $conn->query("SELECT * FROM databuku");
            while($row = mysqli_fetch_object($query)){
                $data[] = $row;
            }
            $response = array(
                'status' => true,
                'message' => 'Get Data Success',
                'data' => $data
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        
        function getBukuId($id=0){
            global $conn;
            $query = "SELECT * FROM databuku";
            if($id !=0){
                $query.=" WHERE id".$id."LIMIT 1";
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
            }else{
                $response = array(
                    'status' => false,
                    'message' => 'Tidak tidak ditemukan'
                );
            }
        
            header('Content-Type: application/json');
            echo json_encode($response);
        }

        public function insertBuku(){
            global $conn;
            $arrcheckpost = array(
                'judul' => '',
                'pengarang' => '',
                'tempat_terbit' => '',
                'penerbit' => '',
                'tahun_terbit' => '',
                'edisi' => '',
                'jumlah_buku' => '',
                'halaman' => '',
                'tanggal_masuk' => '',
                'jenis_buku' => '',
                'isbn' => '',
                'sumber' => '',
                'harga' => '',
                'keterangan' => ''
            );
            $hitung = count(array_intersect_key($_POST, $arrcheckpost));

            if($hitung == count($arrcheckpost)){
                $result = mysqli_query($conn, "INSERT INTO databuku SET
                judul ='$_POST[judul]',
                pengarang = '$_POST[pengarang]',
                tempat_terbit = '$_POST[tempat_terbit]',
                tahun_terbit = '$_POST[tahun_terbit]',
                edisi = '$_POST[edisi]',
                jumlah_buku = '$_POST[jumlah_buku]',
                halaman = '$_POST[halaman]',
                tanggal_masuk = '$_POST[tanggal_masuk]',
                jenis_buku = '$_POST[jenis_buku]',
                isbn = '$_POST[isbn]',
                sumber = '$_POST[sumber]',
                harga = '$_POST[harga]',
                keterangan = '$_POST[keterangan]'
                ");

                if($result){
                    $response = array(
                        'status' => true,
                        'message' => 'Add Data Success'
                    );
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
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }

        function updateBuku($id){
            global $conn;
            $arrcheckpost = array(
                'judul' => '',
                'pengarang' => '',
                'tempat_terbit' => '',
                'penerbit' => '',
                'tahun_terbit' => '',
                'edisi' => '',
                'jumlah_buku' => '',
                'halaman' => '',
                'tanggal_masuk' => '',
                'jenis_buku' => '',
                'isbn' => '',
                'sumber' => '',
                'harga' => '',
                'keterangan' => ''
            );
            $hitung = count(array_intersect_key($_POST, $arrcheckpost));
            
            if($hitung == count($arrcheckpost)){
                $result = mysqli_query($conn, "UPDATE databuku SET
                judul = '$_POST[judul]',
                pengarang = '$_POST[pengarang]',
                tempat_terbit = '$_POST[tempat_terbit]',
                penerbit = '$_POST[penerbit]',
                tahun_terbit = '$_POST[tahun_terbit]',
                edisi = '$_POST[edisi]',
                jumlah_buku = '$_POST[jumlah_buku]',
                halaman = '$_POST[halaman]',
                tanggal_masuk = '$_POST[tanggal_masuk]',
                jenis_buku = '$_POST[jenis_buku]',
                isbn = '$_POST[isbn]',
                sumber = '$_POST[sumber]',
                harga = '$_POST[harga]',
                keterangan = '$_POST[keterangan]'
                WHERE id_buku ='$id'
                ");

                if($result){
                    $response = array(
                        'status' => true,
                        'message' => 'Update Data Success'
                    );
                }else{
                    $response = array(
                        'status' => false,
                        'message' => 'Update Data Failed'
                    );
                }
            }else{
                $response = array(
                    'status' => false,
                    'message' => 'Parameter Do Not Match'
                );
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }

        function deleteBuku($id){

            global $conn;
            $query = "DELETE FROM databuku WHERE id_buku =".$id;
            if(mysqli_query($conn, $query)){
                $response = array(
                    'status' => true,
                    'message' => 'Delete Data Success'
                );
            }else{
                $response = array(
                    'status' => false,
                    'message' => 'Delete Data Failed'
            );
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
?>