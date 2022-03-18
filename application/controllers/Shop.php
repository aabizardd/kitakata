<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->model('Book_Model', 'm_book');
	}

	public function index()
	{

		$category = $this->input->get('category');
		$book_name = $this->input->get('book_name');


		$where = null;

		if (is_null($book_name) && is_null($category) || is_null($book_name) && $category == "all" || $book_name == "" && $category == "all") {
			$where = null;
		} elseif ($category) {
			$where = [
				'category_name' => $category
			];
		} elseif ($book_name) {
			$where = [
				'book_name' => $book_name
			];
		}

		$data = [
			'title' => "Shop Kita Kata Store",
			'products' => $this->m_book->get_books_where($where),
			'categories' => $this->m_book->get_count_book_cat(),
			'book_ct' => $this->m_book->ct_book($where),
		];



		$this->load->view('template_user/header', $data);
		$this->load->view('pages_user/shop');
		$this->load->view('template_user/footer');
	}

	public function cart()
	{

		$data = [
			'title' => 'Cart Kita Kata',
			'categories' => $this->m_book->get_count_book_cat(),
		];

		// $this->cart->destroy();
		// var_dump(count($this->cart->contents()));
		// die();

		$this->load->view('template_user/header', $data);
		$this->load->view('pages_user/cart');
		$this->load->view('template_user/footer');
	}

	public function tambah_keranjang($book_id, $qty = 1)
	{

		$where = [
			'book_id' => $book_id
		];

		$buku = $this->m_book->get_one_book($where);
		// $produk = $this->Produk_model->cari($id_produk);

		$disc = $buku['book_price'] * $buku['book_discount'] / 100;
		$harga_disc = $buku['book_price'] - $disc;

		$data_buku = array(
			'id'      	=> $buku['book_id'],
			'qty'     	=> $qty,
			'price'   	=> $buku['book_price'],
			'name'    	=> $buku['book_name'],
			'options' => array('discount' => $buku['book_discount'], 'img' => $buku['book_cover'], 'total' => $harga_disc)
			// 'discount'  => $buku['discount'],
			// 'img'    	=> $buku['book_cover'],
			// 'total'    	=> $harga_disc,
		);

		$this->cart->insert($data_buku);



		redirect($_SERVER['HTTP_REFERER']);
	}

	public function tambah_keranjang_by_form()
	{

		$where = [
			'book_id' => $this->input->post('book_id')
		];

		$buku = $this->m_book->get_one_book($where);
		// $produk = $this->Produk_model->cari($id_produk);

		$disc = $buku['book_price'] * $buku['book_discount'] / 100;
		$harga_disc = $buku['book_price'] - $disc;

		$data_buku = array(
			'id'      	=> $buku['book_id'],
			'qty'     	=> $this->input->post('qty'),
			'price'   	=> $buku['book_price'],
			'name'    	=> $buku['book_name'],
			'options' => array('discount' => $buku['book_discount'], 'img' => $buku['book_cover'], 'total' => $harga_disc)
			// 'discount'  => $buku['discount'],
			// 'img'    	=> $buku['book_cover'],
			// 'total'    	=> $harga_disc,
		);

		$this->cart->insert($data_buku);



		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_cart($id)
	{


		$data = array(
			'rowid'   => $id,
			'qty'     => 0
		);

		$this->cart->update($data);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_cart()
	{

		$rowid = $this->input->post('rowid');
		$qty = $this->input->post('qty');



		foreach ($rowid as $key => $value) {

			$data = [
				'rowid' => $value,
				'qty' => $qty[$key],
			];

			$this->cart->update($data);
		}

		redirect('cart');
	}
}