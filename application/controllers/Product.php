<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->model('Book_Model', 'm_book');
	}

	public function index($book_id)
	{

		$data = [
			'title' => "Detail Product Kita Kata Store",
			'books_detail' => $this->m_book->get_book_detail($book_id),
			'products' => $this->m_book->get_books(),

		];

		$this->load->view('template_user/header', $data);
		$this->load->view('pages_user/product_detail');
		$this->load->view('template_user/footer');
	}
}