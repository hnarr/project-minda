<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_beranda(){
                
        // return $data;
        return view('admin.adminberanda');
        }
}
