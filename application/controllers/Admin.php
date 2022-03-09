<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->model('Book_Model', 'm_book');

        if (!$this->session->userdata('admin_username')) {
            redirect('logout');
        }

        // var_dump($this->session->userdata('admin_username'));
        // die();
    }

    public function index()
    {

        if ($this->session->userdata('admin_username')) {
            redirect('admin/dashboard');
        }


        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $data = [
                'title' => 'Login - Kata Kiri Store'
            ];

            $this->load->view('templates_admin/header', $data);
            $this->load->view('admin/login');
            $this->load->view('templates_admin/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('t_admin', [
            'admin_username' => $username,
        ])->row_array();

        if ($user) {


            if ($user['is_active'] == 1) {

                //cek password
                if (password_verify($password, $user['password_account'])) {

                    $data = [
                        'admin_username' => $user['admin_username'],
                        'admin_id' => $user['admin_id'],
                        'admin_name' => $user['admin_name'],
                        'admin_img' => $user['admin_img'],
                    ];

                    $this->session->set_userdata($data);

                    redirect('admin/dashboard');
                } else {
                    $this->session->set_flashdata('message', $this->alert_dismiss('danger', 'Wrong password'));

                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('message', $this->alert_dismiss('danger', 'Account is not active'));

                redirect('admin');
            }
        } else {

            $this->session->set_flashdata('message', $this->alert_dismiss('danger', 'Account is not registered'));
            redirect('admin');
        }
    }

    public function dashboard()
    {


        $data = [
            'title' => 'Dashboard Admin - Kata Kiri Store'
        ];

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
    }


    public function kelola_buku()
    {


        $books = $this->m_book->get_books();


        $data = [
            'title' => 'Kelola Buku - Kata Kiri Store',
            'books' => $books
        ];

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/kelola_buku');
        $this->load->view('templates_admin/footer');
    }

    public function tambah_buku()
    {

        $data = [
            'title' => 'Tambah Buku - Kata Kiri Store',
            'categories' => $this->m_book->get('t_categories')
        ];

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/tambah_buku');
        $this->load->view('templates_admin/footer');
    }

    public function add_book()
    {

        $config['upload_path'] = './assets/img/book_cover/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('book_cover')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('admin/tambah_buku', $error);
        } else {
            $data = array('image_metadata' => $this->upload->data());

            $this->load->view('admin/tambah_buku', $data);
        }

        // $book_cover =  $this->_uploadFile();
        // $book_name =  $this->input->post('book_name');
        // $book_category =  $this->input->post('book_category');
        // $book_discount =  $this->input->post('book_discount');
        // $book_price =  $this->input->post('book_price');
        // $book_stock =  $this->input->post('book_stock');
        // $book_synopsis =  $this->input->post('book_synopsis');
        // $book_writer =  $this->input->post('book_writer');
        // $book_publisher =  $this->input->post('book_publisher');
        // $book_edition =  $this->input->post('book_edition');
        // $book_size =  $this->input->post('book_size');
        // $book_thick =  $this->input->post('book_thick');
        // $book_weight =  $this->input->post('book_weight');
        // $book_isbn =  $this->input->post('book_isbn');


        // var_dump($book_cover);
        // die();

        // $data_book_1 = [
        //     'book_name' => $book_name,
        //     'book_cover' => $book_cover,
        //     'book_category' => $book_category,
        //     'book_discount' => $book_discount,
        //     'book_price' => $book_price,
        //     'book_stock' => $book_stock,
        //     'book_synopsis' => $book_synopsis,
        // ];



        // $this->db->insert('t_books', $data_book_1);


        redirect('admin/tambah_buku');
        // var_dump($book_cover);
        // die();
    }

    private function _uploadFile()
    {
        $config['upload_path'] = './assets/img/book_cover/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('book_cover')) {
            $err = $this->upload->display_errors();

            $flahdata = $this->alert_dismiss('danger', $err);

            $this->session->set_flashdata('message', $flahdata);
            $this->load->view('admin/tambah_buku');
        } else {
            $file_name = $this->upload->data();

            return $file_name;
        }
    }

    public function logout()
    {

        $this->session->sess_destroy();
        redirect('admin');
    }

    public function alert_dismiss($type, $text)
    {
        $alert = '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
		' . $text . '
		<button type="button" class="btn-close" data-bs-dismiss="alert"
			aria-label="Close"></button>
		</div>';

        return $alert;
    }
}