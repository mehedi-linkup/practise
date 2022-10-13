<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserImage;
use Illuminate\Http\Request;

class UserImageController extends Controller
{
    public function index() {
        
        return view('pages.admin.user_image');
    }
}
