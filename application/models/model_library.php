<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_library extends CI_model{

 //-------insert Data------//
 public function insertData($db_library,$data)
 {
  $insert = $this->db->insert($db_library,$data);
  return $insert;
 }

 //--------------Get Data---------------//
 public function getAllData($db_library){
  $data = $this->db->get($db_library);
  return $data->result_array();
 }

 //------------Delete Data-------------//
 function delete($table_name,$id,$id_db){
  $this->db->delete($db_library, array($id_db => $id));
  return;
 }
 
 //-----------Get Data by Id------------//
 function getData($db_library, $id,$id_db){
  $query = $this->db->where($id_db, $id)
        ->get($db_library);
  if($query->num_rows()>0){
   return $query->row();
  }
 }

 //------------Update Data-------------//
 function update($db_library, $data, $id, $id_db){
  $this->db->where($id_db, $id);
  $this->db->update($db_library, $data);
 }
}