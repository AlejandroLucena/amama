<?php

namespace Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ManageUsers;

class AdminController extends Controller
{
    use ManageUsers;

    public function index()
    {
        $user = auth()->user();

        return view('admin.index', compact('user'));
    }

    public function show()
    {
        $title = __('Datos Personales');
        $user = auth()->user();
        $user->load('media');
        $options = ['route' => ['teacher.update', ['user' => $user]], 'files' => true];
        $update = true;

        return view('admin.show', compact('title', 'user', 'options', 'update'));
    }
}
