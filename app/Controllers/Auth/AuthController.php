<?php

namespace App\Controllers\Auth;

use App\Entities\User;
use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function getSignOut($request, $response)
    {
        $this->auth->logout();

        return $response->withRedirect($this->router->pathFor('auth.signin'));
    }

    public function getSignIn($request, $response)
    {
        return $this->view->render($response, 'auth/signin.twig');
    }

    public function postSignIn($request, $response)
    {
	    $validation = $this->validator->validate($request, [
		    'email' => ['required'],
		    'password' => ['required']
	    ]);

	    if ($validation->failed()) {
		    return $response->withRedirect($this->router->pathFor('auth.signin'));
	    }

        $auth = $this->auth->attempt(
            $request->getParam('email'),
            $request->getParam('password')
        );

        if (!$auth) {
            $this->flash->addMessage('error', 'Could not sign you in with those details.');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }

	    $this->flash->addMessage('success', 'Welcome ' . $this->auth->user()->name);
        return $response->withRedirect($this->router->pathFor('home'));
    }

    public function getSignUp($request, $response)
    {
        return $this->view->render($response, 'auth/signup.twig');
    }

    public function postSignUp($request, $response)
    {
        $validation = $this->validator->validate($request, [
            'email' => ['required'],
            'name' => ['required'],
            'password' => ['required']
        ]);

        if ($validation->failed()) {
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }

        $user = User::create([
            'email' => $request->getParam('email'),
            'name' => $request->getParam('name'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
        ]);

        $this->flash->addMessage('info', 'You have been signed up!');

        $this->auth->attempt($user->email, $request->getParam('password'));

        return $response->withRedirect($this->router->pathFor('home'));
    }
}
