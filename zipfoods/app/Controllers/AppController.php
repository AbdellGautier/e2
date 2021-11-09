<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        $welcomes = ['Welcome', 'Aloha', 'Welkom', 'Bienvenidos', 'Bienvenu', 'Welkomma'];
        
        return $this->app->view('index', [
            'welcome' => $welcomes[array_rand($welcomes)]
        ]);
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
