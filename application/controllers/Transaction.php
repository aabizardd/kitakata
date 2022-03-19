<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->model('Book_Model', 'm_book');
    }

    public function checkout()
    {

        if (!$this->session->userdata('user_id')) {

            $this->session->set_flashdata('message', $this->alert_dismiss('danger', 'Login terlebih dahulu untuk melanjutkan pesanan!'));

            redirect('auth');
        } elseif (count($this->cart->contents()) == 0) {
            $this->session->set_flashdata('message', $this->alert_dismiss('danger', 'Pesanan anda belum ada!'));

            redirect('home');
        } else {
            $data = [
                'title' => 'Checkout - Kita Kata Store',
                'categories' => $this->m_book->get_count_book_cat(),
                'payments' => $this->db->get('t_payments')->result()
            ];


            $this->load->view('template_user/header', $data);
            $this->load->view('pages_user/checkout');
            $this->load->view('template_user/footer');
        }
    }

    public function create_order()
    {

        // var_dump($this->session->userdata('user_id'));
        // die();

        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $payment_id = $this->input->post('payment_id');
        $order_address = $this->input->post('order_address');
        $order_phone_number = $this->input->post('order_phone_number');
        $order_total_price = $this->input->post('order_total_price');

        $data = [
            'order_name' => $first_name . " " . $last_name,
            'payment_id' => $payment_id,
            'order_address' => $order_address,
            'order_phone_number' => $order_phone_number,
            'order_total_price' => $order_total_price,
            'user_id' => $this->session->userdata('user_id'),
        ];

        $this->db->insert('t_order', $data);
        $order_id = $this->db->insert_id();


        foreach ($this->cart->contents() as $items) {

            $data_order_detail = [
                'goods_id' => $items['id'],
                'goods_qty' => $items['qty'],
                'order_id' => $order_id
            ];

            $this->db->insert('t_order_detail', $data_order_detail);

            // $items['rowid']

            $data_cart = array(
                'rowid'   => $items['rowid'],
                'qty'     => 0
            );

            $this->cart->update($data_cart);
        }



        redirect('home');
    }

    public function cek_pesanan()
    {


        $data = [
            'title' => 'Cart Kita Kata',
            'categories' => $this->m_book->get_count_book_cat(),
            'orders' => $this->m_book->get_order(),
        ];

        // $this->cart->destroy();
        // var_dump(count($this->cart->contents()));
        // die();

        $this->load->view('template_user/header', $data);
        $this->load->view('pages_user/pesanan');
        $this->load->view('template_user/footer');
    }

    public function batal($order_id)
    {

        $data = [
            'order_status' => 5
        ];

        $where = [
            'order_id' => $order_id
        ];

        $this->db->update('t_order', $data, $where);

        $this->session->set_flashdata('message', $this->alert_dismiss('success', 'Pesanan berhasil dibatalkan!'));

        redirect('pesanan');
    }

    public function detail_pesanan($order_id)
    {
        $data = [
            'title' => 'Checkout - Kita Kata Store',
            'categories' => $this->m_book->get_count_book_cat(),
            'payments' => $this->db->get('t_payments')->result(),
            'order_detail' => $this->m_book->get_detail_order($order_id),
            'book_order' => $this->m_book->get_detail_book($order_id),
        ];


        $this->load->view('template_user/header', $data);
        $this->load->view('pages_user/detail_pesanan');
        $this->load->view('template_user/footer');
    }


    public function bayar_buku()
    {

        $order_id = $this->input->post('order_id');

        // var_dump($order_id);
        // die();

        $data = [
            'order_proof' => $this->_upload(),
            'order_status' => 6,
        ];

        $where = [
            'order_id' => $order_id

        ];


        $this->db->update('t_order', $data, $where);

        $flahdata = $this->alert_dismiss('success', 'Berhasil unggah bukti pembayaran!');
        $this->session->set_flashdata('message', $flahdata);

        redirect($_SERVER['HTTP_REFERER']);
    }

    private function _upload()
    {
        $namaFiles = $_FILES['order_proof']['name'];
        $ukuranFile = $_FILES['order_proof']['size'];
        $type = $_FILES['order_proof']['type'];
        $eror = $_FILES['order_proof']['error'];



        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES['order_proof']['tmp_name'];


        if ($eror === 4) {
            $flahdata = $this->alert_dismiss('danger', 'Belum memilih gambar');

            $this->session->set_flashdata('message', $flahdata);

            redirect($_SERVER['HTTP_REFERER']);
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

        $ekstensiGambar = explode('.', $namaFiles);


        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $flahdata = $this->alert_dismiss('danger', 'Yang kamu pilih bukan gambar!');
            $this->session->set_flashdata('message', $flahdata);

            redirect($_SERVER['HTTP_REFERER']);
            return false;
        }


        $namaFilesBaru = "order-proof";
        $namaFilesBaru .= uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/img/bukti_bayar/' . $namaFilesBaru);

        return $namaFilesBaru;
    }

    public function alert_dismiss($type, $text)
    {

        $alert = '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
    ' . $text . '
    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';

        return $alert;
    }
}