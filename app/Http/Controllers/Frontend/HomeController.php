<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])
            ->only(['home']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.welcome');
    }

    /**
     * Show the application abbout us.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function aboutUs()
    {
        return view('pages.aboutus');
    }

    public function legal()
    {
        return view('pages.legal');
    }

    public function cookies()
    {
        return view('pages.cookies');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }
}
