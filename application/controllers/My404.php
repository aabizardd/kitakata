<?php
class My404 extends CI_Controller
{
    public function __construct()
	{

		parent::__construct();

		$this->load->model('Book_Model', 'm_book');
	}


    public function index()
    {
        
        $data = [
			'title' => "404 Not Found",
			'categories' => $this->m_book->get('t_categories'),
			'categories_limit' => $this->m_book->get_limit('t_categories', 4),
			'product_discount' => $this->m_book->get_book_discount(),
			'products' => $this->m_book->get_books(),

		];
        
        $this->output->set_status_header('404');
        $this->load->view('template_user/header', $data);
        $this->load->view('err404');
        $this->load->view('template_user/footer');
    }
}