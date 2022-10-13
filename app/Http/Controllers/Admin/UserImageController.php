<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\UserImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserImageController extends Controller
{
    public function index() {
        
        return view('pages.admin.user_image');
    }
    public function store(Request $request) {
        try {
            $res = new stdClass();
            $data = json_decode($request->data);
            $userimage = new UserImage;
            $userimage->name = $data->name;
            $userimage->address = $data->address;
            // $userimage->image = $request->image;
            $userimage->save();
            return response()->json($request->data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
       
    }
}
