<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\StreamService;
use App\Http\Requests\StreamRequest;

class PagesController extends Controller
{
        public function __construct(StreamService $streamService)
    {
        $this->service = $streamService;
    }
    /**
     * Homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('auth.login');
    }

    /**
     * Dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $streams = $this->service->paginated();
        return view('dashboard.main')->with('streams', $streams);
        //return view('dashboard.main');
    }
}
