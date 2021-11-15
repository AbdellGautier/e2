<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        return $this->app->view('index');
    }

    public function about()
    {
        return $this->app->view('about', [
            'appDescription' => "ZipFoods is the ultimate site to get your groceries!"
        ]);
    }

    public function contact()
    {
        return $this->app->view('contact', [
            'email' => "support@zipfoods.com"
        ]);
    }
}
