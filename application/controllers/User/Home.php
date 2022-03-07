<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();

		$this->load->model('Book_Model', 'm_book');
	}

	public function index()
	{

		$data = [
			'title' => "Beranda Kita Kata Store",
			'categories' => $this->m_book->get('t_categories'),
			'categories_limit' => $this->m_book->get_limit('t_categories', 4),
			'product_discount' => $this->m_book->get_book_discount(),
			'products' => $this->m_book->get_books(),

		];

		$this->load->view('template_user/header', $data);
		$this->load->view('pages_user/home');
		$this->load->view('template_user/footer');
	}

	public function tambah_keranjang($book_id)
	{
	}
}