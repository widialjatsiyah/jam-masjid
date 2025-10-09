<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hari_besar extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'hari_besar';
	private $prefix 	= 'hari_besar';
	private $tbl 		= 'hari_besar_islam';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		// Mengambil data hari besar yang akan datang dalam 90 hari
		$this->db->where('tanggal_masehi >=', date('Y-m-d'));
		$this->db->where('tanggal_masehi <=', date('Y-m-d', strtotime('+90 days')));
		$this->db->order_by('tanggal_masehi', 'ASC');
		$getdata = $this->db->get($this->tbl)->result_array();

		$data['initurl'] 			= $this->initurl;
		$data['fullurl'] 			= $this->fullurl;
		$data['data'] = $getdata;
		$this->template->show($this->prefix, $data);
	}

	public function getdata()
	{
		// Mengambil data hari besar yang akan datang dalam 90 hari
		$this->db->where('tanggal_masehi >=', date('Y-m-d'));
		$this->db->where('tanggal_masehi <=', date('Y-m-d', strtotime('+90 days')));
		$this->db->order_by('tanggal_masehi', 'ASC');
		$getdata = $this->db->get($this->tbl)->result_array();

		$data['data'] = $getdata;
		$this->load->view('hari_besar', $data);
	}
}