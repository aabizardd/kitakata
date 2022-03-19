<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        if ($this->session->userdata('user_id')) {
            redirect('home');
        }

        $this->load->model('Auth_model', 'm_auth');
        $this->load->model('Book_Model', 'm_book');
    }

    public function index()
    {



        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => "Login - Kita Kata Store",
                'categories' => $this->m_book->get('t_categories'),
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('pages_auth/login');
            $this->load->view('template_user/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('t_users', [
            'username' => $username,
        ])->row_array();


        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {

                $data = [
                    'email' => $user['email'],
                    'user_id' => $user['user_id'],
                    'username' => $user['username']
                ];

                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata('message', $this->alert_dismiss('danger', 'Password Salah!'));
                redirect('auth');
            }
        } else {

            $this->session->set_flashdata('message', $this->alert_dismiss('danger', 'Username Belum Terdaftar!'));
            redirect('auth');
        }
    }



    public function registrasi()
    {


        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[t_users.email]', [
            'valid_email' => 'Email not valid',
        ]);
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[t_users.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == false) {

            $data = [
                'title' => "Registrasi - Kita Kata Store",
                'categories' => $this->m_book->get('t_categories'),
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('pages_auth/registrasi');
            $this->load->view('template_user/footer');
        } else {


            $data_insert = [

                'username' => htmlspecialchars($this->input->post('username')),
                'email' => htmlspecialchars($this->input->post('email')),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('t_users', $data_insert);


            $this->session->set_flashdata('message', $this->alert_dismiss('success', 'Akun anda sudah dibuat. Silahkan untuk login!'));

            redirect('auth');
        }
    }

    public function forgot_password()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => "Lupa Password - Kita Kata Store",
                'categories' => $this->m_book->get('t_categories'),
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('pages_auth/lupa_pw');
            $this->load->view('template_user/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('t_users', ['email' => $email])->row_array();

            if ($user) {

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time(),
                ];

                $this->db->insert('t_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', $this->alert_dismiss('success', 'Silahkan cek email kamu untuk mengubah password!'));
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', $this->alert_dismiss('danger', 'Email tidak terdaftar di database!'));
                redirect('forgot_password');
            }
        }
    }

    private function _sendEmail($token, $type)
    {

        $this->load->library('email');
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'kitakatastore22@gmail.com',
            'smtp_pass' => 'Suksesselalu79',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);
        $this->email->from('admin_kitakata@gmail.com', 'Admin KitaKataStore');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {

            $this->email->subject('Account Verification');
            $this->email->message('Klik link ini untuk aktivasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a> <br> Token aktivasi akan berlaku selama 2x24 jam, lebih dari itu token tidak akan berlaku kembali');
        } else if ($type == 'forgot') {

            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk mengubah password akun anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a> <br> Token aktivasi akan berlaku selama 2x24 jam, lebih dari itu token tidak akan berlaku kembali');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetpassword()
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('t_users', ['email' => $email])->row_array();

        if ($user) {

            $user_token = $this->db->get_where('t_token', ['token' => $token])->row_array();

            if ($user_token) {

                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', $this->alert_dismiss('danger', 'Reset password failed, wrong token!'));
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', $this->alert_dismiss('success', 'Reset password failed, wrong email!'));
            redirect('auth');
        }
    }

    public function changePassword()
    {

        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password', 'Paassword', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Repeat Paassword', 'trim|required|min_length[5]|matches[password]');

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Change Password - Kita Kata Store',
                'categories' => $this->m_book->get('t_categories'),
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('pages_auth/change_pw');
            $this->load->view('template_user/footer');
        } else {

            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('t_users');

            $this->db->delete('t_token', ['email' => $email]);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', $this->alert_dismiss('success', 'Password Berhasil diperbarui, Silahkan Login!'));

            redirect('auth');
        }
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