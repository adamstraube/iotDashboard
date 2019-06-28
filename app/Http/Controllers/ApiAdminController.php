<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class ApiAdminController extends Controller
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
     * @return Response
     */
    public function index(): Response
    {
        return view('api.api');
    }
}
