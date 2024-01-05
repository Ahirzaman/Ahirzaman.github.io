<?php

namespace App\Controllers;
use App\Models\Message;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
	public function index()
	{
		return view('main/home');
	}

	public function about()
	{
		return view('main/about');
	}
	
	public function registry()
	{
		return view('main/registry');
	}

	public function registry_uploads()
	{
		return view('main/registry_uploads');
	}

	public function login()
	{
		return view('main/login');
	}

	public function admin()
	{
		return view('main/admin');
	}

	public function admin_upload()
	{
		return view('main/admin_upload');
	}

	public function login_user()
	{
		return view('main/login_user');
	}

	public function register_user()
	{
		return view('main/register_user');
	}

	public function Home_chat()
	{
		return view('main/chat');
	}

	use ResponseTrait;
	public function index_chat()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == 'post')
		{
			$rules = [
				'username' => 'required'
			];

			if(!$this->validate($rules))
			{
				$data['validation'] = $this->validator;
			}else{
				$model = new UsersModel();
				$check_username = $model->where('username', $this->request->getVar('username'))->first();
				if($check_username){
					$userdata = [
						'username' => $check_username['username']
					];
					session()->set($userdata);
					return redirect()->to('main/chat');
				}
				$save = [
					'username' => $this->request->getVar('username')
				];

				$model->save($save);
				$userdata = [
					'username' => $save['username']
				];
				session()->set($userdata);
				return redirect()->to('main/chat');
			}
		}
		return view('main/chat', $data);
	}

	public function chat()
	{
		if(!session()->get('username'))
			return redirect()->to('/');
			
		if($this->request->getMethod() == 'post')
		{
			$rules = [
				'message' => 'required'
			];

			if(!$this->validate($rules)){
				return $this->fail($this->validator->getErrors());
			}else{
				$model = new Message();
				$msg = [
					'username' => session()->get('username'),
					'message' => $this->request->getVar('message')
				];
				$model->save($msg);
				return $this->respondCreated($msg);
			}

		}
		return view('main/chat');
	}

	public function msg()
	{
		$model = new Message();
		$data = $model->orderBy('id', 'DESC')->findAll();
		return $this->respond($data);
	}

	
}
