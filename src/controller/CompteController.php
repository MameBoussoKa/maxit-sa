<?php

namespace App\Controller;

use App\Abstract\AbstractController;
use App\Core\Validate;
use App\Repository\UserRepository;
use App\Service\UserService;

class CompteController extends AbstractController
{
  

    public function __construct()
    {
       $this->layout = 'base';
       
    }
    public function create() {

    }
    public function store() {
    }
    public function show() {}

    public function index(){}
    public function edit() {
         $this->renderHtml('compte/compte');
    }
    public function destroy() {}
}
