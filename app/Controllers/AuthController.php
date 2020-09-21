<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Firebase\JWT\JWT;
use Exception;

class AuthController extends ResourceController
{

	protected $modelName = 'App\Models\UserModel';
	protected $format = 'json';

	public function __construct()
	{
		$this->modelName = 'App\Models\UserModel';
	}

	public function create()
	{



		/**
		 * JWT claim types
		 * https://auth0.com/docs/tokens/concepts/jwt-claims#reserved-claims
		 */

		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');


		$user = $this->model->where('email', $email)->first();




		// add code to fetch through db and check they are valid
		// sending no email and password also works here because both are empty
		if ($user->password == $password) {

			$time = time();
			$key = Services::getSecretKey();
			$payload = [
				//	'aud' => 'http://example.com',
				'iat' => $time,
				//'nbf' => 1357000000,
				'exp' => $time + 60,
				'data' => [
					'first_name' => $user->first_name,
					'last_name' => $user->first_name,
					'email' => $user->email,
				]
			];

			/**
			 * IMPORTANT:
			 * You must specify supported algorithms for your application. See
			 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
			 * for a list of spec-compliant algorithms.
			 */

			$jwt = JWT::encode($payload, $key);
			return $this->respond(['token' => $jwt], 200);
		}

		return $this->respond(['message' => 'Invalid login details'], 401);
	}

	protected function validateToken($token)
	{
		try {
			$key = Services::getSecretKey();
			return JWT::decode($token, $key, array('HS256'));
		} catch (Exception $e) {
			return false;
		}
	}

	public function verifyToken()
	{

		$key = Services::getSecretKey();
		$token = $this->request->getPost("token");

		if ($this->validateToken($token) == false) {
			return $this->respond(['messagem' => 'Token Invávido'], 401);
		} else {
			$data = JWT::decode($token, $key, array('HS256'));
			return $this->respond(['data' => $data], 200);
		}
	}
}
