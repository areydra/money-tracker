<?php
namespace App\Controllers;
use App\Models\AuthModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

	public function index()
	{
        $authModel = new AuthModel();

        if ($authModel->current_user()) {
            return redirect()->to(base_url('/dashboard'));
        } else {
            return view('login_form');            
        }
	}

	public function login()
	{
        $authModel = new AuthModel();
        $isUserValid = false;
        $data = [
            'username' => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password'),
        ];

		if(strlen($data['username']) > 0 && strlen($data['password']) > 0) {
            $isUserValid = true;
        }

		if(!$isUserValid || !$authModel->login($data['username'], $data['password'])){
            $this->session->setFlashData('message_login_error', 'Login Gagal, pastikan username dan password benar!');
            return view('login_form'); 
		}

        return redirect()->to(base_url('/dashboard'));
	}

	public function logout()
	{
        $authModel = new AuthModel();
		$authModel->logout();
		return redirect()->to(base_url('/login'));
	}
}
