<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        echo view('layout/authenticated/header');
        echo view('home');
        echo view('layout/authenticated/footer');
    }
}
