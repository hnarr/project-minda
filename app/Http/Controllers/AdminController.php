<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permintaan;
use App\User;

class AdminController extends Controller
{
    public function admin_beranda(){
                
    // return $data;
    return view('admin.adminberanda');
    }

    
}
