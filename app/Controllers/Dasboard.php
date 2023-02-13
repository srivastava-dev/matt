<?php 
namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        echo "Welcome back, ".$session->get('username');
    }
}