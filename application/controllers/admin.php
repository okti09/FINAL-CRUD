<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

public function __construct(){
  parent ::__construct();

  //load model
  $this->load->model('model_library'); 
 }
	public function index() {
		$this->load->view('admin/index');
	}
	public function login() {
		$this->load->view('login');
	}
	public function loginAction() {
		redirect(base_url("index.php/admin/index"));
	}
	public function customer() {
		$this->load->view('admin/customer');
	}
	public function customerTambah(){
		$this->load->view('admin/customerForm');	
	}
	public function company() {
		$this->load->view('admin/company');
	}
	public function companyTambah(){
		$this->load->view('admin/companyForm');	
	}
	public function library() {
		$db_library['db_library']=$this->model_library->getAllData('db_library');
  $this->load->view('admin/library', $db_library);
		$this->load->view('admin/library');
	}
	public function libraryTambah(){
		$this->load->view('admin/libraryForm');	
	}
	public function product() {
		$this->load->view('admin/product');
	}
	public function productTambah(){
		$this->load->view('admin/productForm');	
	}
	public function post(){
		$this->load->view('admin/posts');	
	}
	//------------Tambah-------------//
 public function simpan(){
  $data = array('No.Buku'=> $this->input->post('No.Buku', true),
   'No.Buku'=> $this->input->post('No.Buku', true),
   'Judul_Buku'=> $this->input->post('Judul_Buku', true),
   'Penulis'=> $this->input->post('Penulis', true),
   'Kategori'=> $this->input->post('Kategori', true),
   'Bahasa'=> $this->input->post('Bahasa', true),
   'Descripsi'=> $this->input->post('Descripsi', true),
   'Status'=> $this->input->post('Status', true)
  );

  $this->model_company->insertData('db_library',$data);
  redirect('admin/library');
 }

 //------------Edit-------------//
 public function edit($id)
 {
  $db_library['db_library'] = $this->model_library->getData('db_library',$id,'No.Buku');
  $this->load->view('libraryFormEdit', $db_library);
 }

 public function update()
 {
  $data = array('Judul_Buku'=> $this->input->post('Judul_Buku', true),
  'Penulis'=> $this->input->post('Penulis', true),
   'Kategori'=> $this->input->post('Kategori', true),
   'Bahasa'=> $this->input->post('Bahasa', true),
   'Descripsi'=> $this->input->post('Descripsi', true),
   'Status'=> $this->input->post('Status', true)
 );
 $id = $this->input->post('hidden_id');
 $this->model_library->update('db_library',$data,$id, 'No.Buku');
 redirect('admin/library');
 }

 //------------Delete-------------//
 public function delete()
 {
  $u = $this->uri->segment(3);
  $this->model_library->delete('db_library', $u, 'No.Buku');
  redirect('admin/library','refresh');
 }
}
