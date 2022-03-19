<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->model('Book_Model', 'm_book');



        // var_dump($this->session->userdata('admin_username'));
        // die();
    }

    public function check_session()
    {

        if (!$this->session->userdata('admin_username')) {
            redirect('admin');
        }
    }

    public function index()
    {


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

        $this->check_session();

        $data = [
            'title' => 'Dashboard Admin - Kata Kiri Store'
        ];

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
    }


    public function kelola_buku()
    {
        $this->check_session();

        $books = $this->m_book->get_books();


        $data = [
            'title' => 'Kelola Buku - Kata Kiri Store',
            'books' => $books
        ];

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/kelola_buku');
        $this->load->view('templates_admin/footer');
    }

    public function edit_buku($book_id)
    {
        $this->check_session();

        $detail_book = $this->m_book->get_book_detail($book_id);

        $data = [
            'title' => 'Edit Buku - Kata Kiri Store',
            'categories' => $this->m_book->get('t_categories'),
            'book_detail' => $detail_book
        ];

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/edit_buku');
        $this->load->view('templates_admin/footer');
    }



    public function tambah_buku()
    {
        $this->check_session();
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


        $this->check_session();

        $book_cover =  $this->_uploadFile();
        $book_name =  $this->input->post('book_name');
        $book_category =  $this->input->post('book_category');
        $book_discount =  $this->input->post('book_discount');
        $book_price =  $this->input->post('book_price');
        $book_stock =  $this->input->post('book_stock');
        $book_synopsis =  $this->input->post('book_synopsis');
        $book_writer =  $this->input->post('book_writer');
        $book_publisher =  $this->input->post('book_publisher');
        $book_edition =  $this->input->post('book_edition');
        $book_size =  $this->input->post('book_size');
        $book_thick =  $this->input->post('book_thick');
        $book_weight =  $this->input->post('book_weight');
        $book_isbn =  $this->input->post('book_isbn');

        $book_price = preg_replace('/[Rp. ]/', '', $book_price);

        // var_dump($book_synopsis);
        // die();

        $data_book_1 = [
            'book_name' => $book_name,
            'book_cover' => $book_cover,
            'book_category' => $book_category,
            'book_discount' => $book_discount,
            'book_price' => $book_price,
            'book_stock' => $book_stock,
            'book_synopsis' => $book_synopsis,
        ];

        $this->db->insert('t_books', $data_book_1);

        $insert_id = $this->db->insert_id();

        $data_book_2 = [
            'book_writer' => $book_writer,
            'book_publisher' => $book_publisher,
            'book_edition' => $book_edition,
            'book_size' => $book_size,
            'book_thick' => $book_thick,
            'book_weight' => $book_weight,
            'book_isbn' => $book_isbn,
            'book_id' => $insert_id,
        ];

        $this->db->insert('t_book_detail', $data_book_2);




        $flahdata = $this->alert_dismiss('success', 'Berhasil menambahkan buku baru!');
        $this->session->set_flashdata('message', $flahdata);




        redirect('admin/tambah_buku');
        // var_dump($book_cover);
        // die();
    }

    public function update_book()
    {

        $this->check_session();

        $book_cover_old =  $this->input->post('book_cover_old');


        $book_cover = "";
        if ($_FILES['book_cover']['name'] == "") {

            $book_cover = $book_cover_old;
        } else {

            $book_cover =  $this->_uploadFile();
        }

        // var_dump($_FILES['book_cover']['name']);
        // die();

        $book_id =  $this->input->post('book_id');


        $book_name =  $this->input->post('book_name');
        $book_category =  $this->input->post('book_category');
        $book_discount =  $this->input->post('book_discount');
        $book_price =  $this->input->post('book_price');
        $book_stock =  $this->input->post('book_stock');
        $book_synopsis =  $this->input->post('book_synopsis');
        $book_writer =  $this->input->post('book_writer');
        $book_publisher =  $this->input->post('book_publisher');
        $book_edition =  $this->input->post('book_edition');
        $book_size =  $this->input->post('book_size');
        $book_thick =  $this->input->post('book_thick');
        $book_weight =  $this->input->post('book_weight');
        $book_isbn =  $this->input->post('book_isbn');

        $book_price = preg_replace('/[Rp. ]/', '', $book_price);

        // var_dump($book_synopsis);
        // die();

        $where = [
            'book_id' => $book_id
        ];

        $data_book_1 = [
            'book_name' => $book_name,
            'book_cover' => $book_cover,
            'book_category' => $book_category,
            'book_discount' => $book_discount,
            'book_price' => $book_price,
            'book_stock' => $book_stock,
            'book_synopsis' => $book_synopsis,
        ];

        $this->db->update('t_books', $data_book_1, $where);

        // $insert_id = $this->db->insert_id();

        $data_book_2 = [
            'book_writer' => $book_writer,
            'book_publisher' => $book_publisher,
            'book_edition' => $book_edition,
            'book_size' => $book_size,
            'book_thick' => $book_thick,
            'book_weight' => $book_weight,
            'book_isbn' => $book_isbn,
        ];

        $this->db->insert('t_book_detail', $data_book_2, $where);




        $flahdata = $this->alert_dismiss('success', 'Berhasil update buku!');
        $this->session->set_flashdata('message', $flahdata);



        redirect('admin/book');
    }

    public function delete_book($book_id)
    {


        $this->db->delete('t_books', ['book_id' => $book_id]);

        $flahdata = $this->alert_dismiss('success', 'Berhasil menghapus buku!');
        $this->session->set_flashdata('message', $flahdata);

        redirect('admin/book');
    }


    private function _uploadFile()
    {

        // var_dump($this->input->post('file_img_materi'));
        // die();

        $namaFiles = $_FILES['book_cover']['name'];
        $ukuranFile = $_FILES['book_cover']['size'];
        $type = $_FILES['book_cover']['type'];
        $eror = $_FILES['book_cover']['error'];



        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES['book_cover']['tmp_name'];


        if ($eror === 4) {
            $flahdata = $this->alert_dismiss('danger', 'Belum memilih gambar');

            $this->session->set_flashdata('message', $flahdata);

            redirect('admin/tambah_buku');
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

        $ekstensiGambar = explode('.', $namaFiles);


        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $flahdata = $this->alert_dismiss('danger', 'Yang kamu pilih bukan gambar!');
            $this->session->set_flashdata('message', $flahdata);

            redirect('admin/tambah_buku');
            return false;
        }

        $gambar_lama = $this->input->post('book_cover_old');

        if ($gambar_lama) {

            $file = 'assets/img/book_cover/' . $gambar_lama;

            is_readable($file);
            unlink($file);
        }

        $namaFilesBaru = "book-cover";
        $namaFilesBaru .= uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/img/book_cover/' . $namaFilesBaru);

        return $namaFilesBaru;
    }

    public function category()
    {

        $this->check_session();

        $categories = $this->db->get('t_categories')->result();


        $data = [
            'title' => 'Kelola Kategori - Kata Kiri Store',
            'categories' => $categories
        ];

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/kelola_kategori');
        $this->load->view('templates_admin/footer');
    }

    public function add_category()
    {

        $category_name = $this->input->post('category_name');

        $data = [
            'category_name' => $category_name
        ];

        $this->db->insert('t_categories', $data);

        $flahdata = $this->alert_dismiss('success', 'Berhasil menambahkan kategori baru!');
        $this->session->set_flashdata('message', $flahdata);

        redirect('admin/category');
    }

    public function delete_category($id)
    {
        $category_id = $id;

        $data = [
            'category_id' => $category_id
        ];

        $this->db->delete('t_categories', $data);

        $flahdata = $this->alert_dismiss('success', 'Berhasil menghapus kategori!');
        $this->session->set_flashdata('message', $flahdata);

        redirect('admin/category');
    }

    public function edit_category()
    {

        $category_name = $this->input->post('category_name');
        $category_id = $this->input->post('category_id');

        $data = [
            'category_name' => $category_name
        ];



        $this->db->update('t_categories', $data, ['category_id' => $category_id]);

        $flahdata = $this->alert_dismiss('success', 'Berhasil mengubahP kategori!');
        $this->session->set_flashdata('message', $flahdata);

        redirect('admin/category');
    }

    public function order()
    {
        $this->check_session();


        $data = [
            'title' => 'Kelola Kategori - Kata Kiri Store',
            'orders' => $this->m_book->get_all_order(),
        ];

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/kelola_orderan');
        $this->load->view('templates_admin/footer');
    }

    public function update_pesanan($order_id, $stat)
    {


        $data = [
            'order_status' => $stat
        ];

        $where = [
            'order_id' => $order_id
        ];

        $this->db->update('t_order', $data, $where);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function kirim_pesanan()
    {

        $order_id = $this->input->post('order_id');
        $order_delivery = $this->input->post('order_delivery');
        $order_receipt = $this->input->post('order_receipt');

        $data = [
            'order_delivery' => $order_delivery,
            'order_receipt' => $order_receipt,
            'order_status' => 3,
        ];

        $where = [
            'order_id' => $order_id
        ];

        $this->db->update('t_order', $data, $where);
        redirect($_SERVER['HTTP_REFERER']);
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