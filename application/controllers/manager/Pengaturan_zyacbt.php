<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan_zyacbt extends Member_Controller
{
	private $kode_menu = 'user-zyacbt';
	private $kelompok = 'pengaturan';
	private $url = 'manager/pengaturan_zyacbt';

	function __construct()
	{
		parent::__construct();
		$this->load->model('cbt_konfigurasi_model');

		parent::cek_akses($this->kode_menu);
	}

	public function index($page = null, $id = null)
	{
		$data['kode_menu'] = $this->kode_menu;
		$data['url'] = $this->url;

		$this->template->display_admin($this->kelompok . '/pengaturan_zyacbt_view', 'Pengaturan ZYACBT', $data);
	}

	function simpan()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('zyacbt-nama', 'Nama ZYACBT', 'required|strip_tags');
		$this->form_validation->set_rules('zyacbt-keterangan', 'Keterangan ZYACBT', 'required|strip_tags');
		$this->form_validation->set_rules('zyacbt-link-login', 'Link Login Operator', 'required|strip_tags');
		$this->form_validation->set_rules('zyacbt-mobile-lock-xambro', 'Lock Mobile Exam Browser', 'required|strip_tags');
		$this->form_validation->set_rules('main-mode', 'Maintenance mode', 'required|strip_tags');
		$this->form_validation->set_rules('tutup-daftar', 'Tutup daftar', 'required|strip_tags');
		// $this->form_validation->set_rules('tutup-bayar', 'Tutup bayar', 'required|strip_tags');

		if ($this->form_validation->run() == TRUE) {
			$data['konfigurasi_isi'] = $this->input->post('zyacbt-nama', true);
			$this->cbt_konfigurasi_model->update('konfigurasi_kode', 'cbt_nama', $data);

			$data['konfigurasi_isi'] = $this->input->post('zyacbt-keterangan', true);
			$this->cbt_konfigurasi_model->update('konfigurasi_kode', 'cbt_keterangan', $data);

			$data['konfigurasi_isi'] = $this->input->post('zyacbt-link-login', true);
			$this->cbt_konfigurasi_model->update('konfigurasi_kode', 'link_login_operator', $data);

			$data['konfigurasi_isi'] = $this->input->post('zyacbt-mobile-lock-xambro', true);
			$this->cbt_konfigurasi_model->update('konfigurasi_kode', 'cbt_mobile_lock_xambro', $data);

			$data['konfigurasi_isi'] = $this->input->post('main-mode', true);
			$this->cbt_konfigurasi_model->update('konfigurasi_kode', 'main_mode', $data);

			$data['konfigurasi_isi'] = $this->input->post('tutup-daftar', true);
			$this->cbt_konfigurasi_model->update('konfigurasi_kode', 'tutup_daftar', $data);

			// $data['konfigurasi_isi'] = $this->input->post('tutup-bayar', true);
			// $this->cbt_konfigurasi_model->update('konfigurasi_kode', 'tutup_bayar', $data);

			$status['status'] = 1;
			$status['pesan'] = 'Pengaturan berhasil disimpan ';
		} else {
			$status['status'] = 0;
			$status['pesan'] = validation_errors();
		}

		echo json_encode($status);
	}

	function get_pengaturan_zyacbt()
	{
		$data['data'] = 1;
		$query = $this->cbt_konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'link_login_operator', 1);
		$data['link_login_operator'] = 'ya';
		if ($query->num_rows() > 0) {
			$data['link_login_operator'] = $query->row()->konfigurasi_isi;
		}

		$query = $this->cbt_konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'cbt_nama', 1);
		$data['cbt_nama'] = 'Computer Based-Test';
		if ($query->num_rows() > 0) {
			$data['cbt_nama'] = $query->row()->konfigurasi_isi;
		}

		$query = $this->cbt_konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'cbt_keterangan', 1);
		$data['cbt_keterangan'] = 'U';
		if ($query->num_rows() > 0) {
			$data['cbt_keterangan'] = $query->row()->konfigurasi_isi;
		}

		$query = $this->cbt_konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'cbt_mobile_lock_xambro', 1);
		$data['mobile_lock_xambro'] = 'ya';
		if ($query->num_rows() > 0) {
			$data['mobile_lock_xambro'] = $query->row()->konfigurasi_isi;
		}

		$query = $this->cbt_konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'main_mode', 1);
		$data['main_mode'] = 'ya';
		if ($query->num_rows() > 0) {
			$data['main_mode'] = $query->row()->konfigurasi_isi;
		}

		$query = $this->cbt_konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'tutup_daftar', 1);
		$data['tutup_daftar'] = 'ya';
		if ($query->num_rows() > 0) {
			$data['tutup_daftar'] = $query->row()->konfigurasi_isi;
		}

		// $query = $this->cbt_konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'tutup_bayar', 1);
		// $data['tutup_bayar'] = 'ya';
		// if ($query->num_rows() > 0) {
		// 	$data['tutup_bayar'] = $query->row()->konfigurasi_isi;
		// }

		echo json_encode($data);
	}
}
