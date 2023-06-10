<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutWebController extends Controller
{
    private $aboutModel;
    public function __construct(About $aboutModel)
    {
        $this->aboutModel = $aboutModel;
    }
    public function index()
    {
        $about = $this->aboutModel->getAll();
        return view('client.pages.about',compact('about'));
    }
}
