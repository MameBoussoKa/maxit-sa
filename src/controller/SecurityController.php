<?php

namespace App\Controller;

use App\Abstract\AbstractController;
use App\Core\Validate;
use App\Repository\UserRepository;
use App\Service\UserService;

class SecurityController extends AbstractController
{
    private UserService $user_service;

    public function __construct()
    {
        $this->layout = 'security';
        $this->user_service = new UserService();
    }



    public function create() {}

    public function store() {
        $password = $_POST['password'];
        $login = $_POST['login'];
        $this->user_service->se_connecter($login,$password);
        var_dump($password, $login);
        die;
           $rules =[
            'email' => [Validate::IS_EMAIL, Validate::IS_EMPTY]
        ];
        

        $data = [
            'email' => 'gorguimrena@gmail.com'
        ];
    }
    public function show() {}

    public function index()
    {
        $this->renderHtml('security/login');
    }
    public function edit() {}
    public function destroy() {}
}
