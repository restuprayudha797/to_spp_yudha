<?php
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('id_petugas')) {

            redirect('admin');
        }
    }

    public function index()
    {
        // cek validation form login
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('auth/index');
        } else {


            $this->_login();
        }
    }
    private function _login()
    {
        // cek input dari form login
        $user = $this->input->post('username', true);
        $pass = $this->input->post('password', true);

        // cek username pada table user_muda
        $ceklogin = $this->db->get_where('petugas', ['username' => $user])->row_array();

        if ($ceklogin) {
            // cek apakah user ada, jika ada maka....
            if ($ceklogin['aktif'] == 'Y') {
                // jika akun aktif maka cocokkan password
                if (password_verify($pass, $ceklogin['password'])) {
                    // apabila password benar....
                    $data = [
                        'id_petugas' => $ceklogin['id_petugas'],
                    ];
                    $this->session->set_userdata($data);

                    // arahkan ke controller admin
                    redirect('admin');
                } else {
                    // password salah
                    $this->session->set_flashdata(
                        'auth_message',
                        '<div class="alert alert-danger" role="alert">Wrong password!
                 </div>'
                    );
                    redirect('auth');
                }
            } else {
                // jika akun tidak aktif
                $this->session->set_flashdata(
                    'auth_message',
                    '<div class="alert alert-danger" role="alert">Your account has been suspended!
             </div>'
                );
                redirect('auth');
            }
        } else {
            // jika user tidak ada
            $this->session->set_flashdata(
                'auth_message',
                '<div class="alert alert-danger" role="alert">Username Invalid!
             </div>'
            );
            redirect('auth');
        }
    }
}
