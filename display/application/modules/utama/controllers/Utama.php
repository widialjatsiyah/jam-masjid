<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utama extends MX_Controller
{

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
			$this->tblprefix . 'posisi' => '1',
			$this->tblprefix . 'status' => '1',
			$this->tblprefix . 'isdelete' => '0'
		];
		$order = [['field' => $this->tblprefix . 'id', 'direction' => 'DESC']];
		$getdata = $this->m_crud->getdata('array', $this->tbl, '*', $where, $order);

		// $data = [];
		// kajian 
		$date = date("Y-m-d");
		$this->db->select('kajian.*, u.user_nama');
		$this->db->from('jadwal_kajian kajian');
		$this->db->join('master_user u', 'kajian.kajian_userid = u.user_id', 'left');
		$this->db->where('kajian.kajian_isdelete', '0');
		$this->db->where("DATE(kajian.kajian_tanggal) >= '{$date}'");
		$this->db->order_by('kajian.kajian_tanggal', 'ASC');
		$kajian = $this->db->get()->result_array();

		// Mendapatkan data hari besar
		// $hari_besar_data = $this->get_hari_besar_data();
		// Mengambil data hari besar yang akan datang dalam 360 hari
		$this->db->where('tanggal_masehi >=', date('Y-m-d'));
		$this->db->where('tanggal_masehi <=', date('Y-m-d', strtotime('+360 days')));
		$this->db->order_by('tanggal_masehi', 'ASC');
		$hari_besar_data = $this->db->get('hari_besar_islam')->result_array();

		$this->db->select('
			tbl.*, 
			m.user_nama AS muadzin_1, 
			m2.user_nama AS muadzin_2, 
			i.user_nama AS imam, 
			k.user_nama AS khatib, 
			c.user_nama AS createby
		');
		$this->db->from('petugas_shalat_jumat tbl');
		$this->db->join('master_user m', 'tbl.petugasshalatjumat_muadzin_1 = m.user_id', 'left');
		$this->db->join('master_user m2', 'tbl.petugasshalatjumat_muadzin_2 = m2.user_id', 'left');
		$this->db->join('master_user i', 'tbl.petugasshalatjumat_imam = i.user_id', 'left');
		$this->db->join('master_user k', 'tbl.petugasshalatjumat_khatib = k.user_id', 'left');
		$this->db->join('master_user c', 'tbl.petugasshalatjumat_createby = c.user_id', 'left');
		// Filter data untuk mendapatkan petugas shalat jumat hari ini
		$this->db->where('tbl.petugasshalatjumat_tanggal', date('Y-m-d'));
		$petugas_jumat = $this->db->get()->result_array();

		$data['initurl'] 			= $this->initurl;
		$data['fullurl'] 			= $this->fullurl;
		$data['data'] = $getdata;
		$data['kajian'] = $kajian;
		$data['hari_besar_data'] = $hari_besar_data;
		$data['petugas_jumat'] = $petugas_jumat;
		$this->template->show($this->prefix, $data);
	}

	public function getdata()
	{

		$where['where'] = [
			$this->tblprefix . 'posisi' => '1',
			$this->tblprefix . 'status' => '1',
			$this->tblprefix . 'isdelete' => '0'
		];
		$order = [['field' => $this->tblprefix . 'id', 'direction' => 'DESC']];
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
