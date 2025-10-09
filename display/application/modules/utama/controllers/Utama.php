<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'utama';
	private $prefix 	= 'utama';
	private $tbl 		= 'konten';
	private $tblprefix 	= 'konten_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$where['where'] = [
			$this->tblprefix.'posisi' => '1',
			$this->tblprefix.'status' => '1',
			$this->tblprefix.'isdelete' => '0'
		];
		$order = [['field' => $this->tblprefix.'id', 'direction' => 'DESC']];
		$getdata = $this->m_crud->getdata('array', $this->tbl, '*', $where, $order);

		// Mendapatkan data hari besar
		$hari_besar_data = $this->get_hari_besar_data();

		$data['initurl'] 			= $this->initurl;
		$data['fullurl'] 			= $this->fullurl;
		$data['data'] = $getdata;
		$data['_utama_hari_besar'] = $hari_besar_data;
		$this->template->show($this->prefix, $data);
	}

	public function getdata()
	{

		$where['where'] = [
			$this->tblprefix.'posisi' => '1',
			$this->tblprefix.'status' => '1',
			$this->tblprefix.'isdelete' => '0'
		];
		$order = [['field' => $this->tblprefix.'id', 'direction' => 'DESC']];
		$getdata = $this->m_crud->getdata('array', $this->tbl, '*', $where);

		$data['data'] = $getdata;
		$this->load->view('utama_load', $data);
	}

	// Fungsi untuk mendapatkan data hari besar
	private function get_hari_besar_data()
	{
		// Memuat modul hari besar
		$this->load->module('hari_besar');
		
		// Mengambil data hari besar yang akan datang dalam 90 hari
		$this->hari_besar->db->where('tanggal_masehi >=', date('Y-m-d'));
		$this->hari_besar->db->where('tanggal_masehi <=', date('Y-m-d', strtotime('+90 days')));
		$this->hari_besar->db->order_by('tanggal_masehi', 'ASC');
		$query = $this->hari_besar->db->get('hari_besar_islam');
		
		$data['data'] = $query->result_array();
		
		// Menggunakan pendekatan yang sama seperti konten utama
		return $this->load->view('hari_besar/hari_besar', $data, true);
	}
}