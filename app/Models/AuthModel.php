<?php
namespace App\Models;

class AuthModel {
    protected $session;
    private $DEFAULT_USERNAME = 'admin';
    private $DEFAULT_PASSWORD = 'admin';
	private $SESSION_KEY = 'username';


    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

	public function rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			]
		];
	}

	public function login($username, $password)
	{
        if ($username !== $this->DEFAULT_USERNAME) {
            return false;
        }

        if ($password !== $this->DEFAULT_PASSWORD) {
			return false;
		}

		$this->session->set($this->SESSION_KEY, $username);
		return true;
	}

	public function current_user()
	{
		if (!$this->session->has($this->SESSION_KEY)) {
			return null;
		}

		return $this->session->get($this->SESSION_KEY);
	}

	public function logout()
	{
		$this->session->remove($this->SESSION_KEY);
		return !$this->session->has($this->SESSION_KEY);
	}
}