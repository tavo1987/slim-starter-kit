<?php

namespace App\Auth;

use App\Entities\User;
use Interop\Container\ContainerInterface;

class Auth
{
	/**
	 * @var ContainerInterface
	 */
	protected $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}

	public function user()
    {
        return User::find($this->container->session->get('user'));
    }

    public function check()
    {
        return $this->container->session->exists('user');
    }

    public function attempt($email, $password)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user->password)) {
	        $this->container->session->set('user', $user->id);
            return true;
        }

        return false;
    }

    public function logout()
    {
	    $this->container->session->delete('user');
    }
}