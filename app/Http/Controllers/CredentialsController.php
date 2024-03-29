<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CredentialsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the Credentials modify dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('credentials.credentials');
    }
}
