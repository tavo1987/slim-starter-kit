<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class PasswordController extends BaseController
{
    public function getChangePassword($request, $response)
    {
        return $this->view->render($response, 'auth/password/change.twig');
    }

    public function postChangePassword($request, $response)
    {
        $validation = $this->validator->validate($request, [
            'password_old' => ['required'],
            'password' => ['required'],
        ]);

        if ($validation->failed()) {
            return $response->withRedirect($this->router->pathFor('auth.password.change'));
        }

        $this->auth->user()->setPassword($request->getParam('password'));

        //$this->flash->addMessage('info', 'Your password was changed.');
        return $response->withRedirect($this->router->pathFor('home'));
    }
}
