<?php

// LoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        $errorMessage = $request->session()->get('error');
        return view('login', compact('errorMessage'));
    }

  

}