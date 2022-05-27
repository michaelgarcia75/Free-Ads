<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Ad;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $ads = Ad::latest()->Paginate(6);
        return view('ads', compact("ads"));
    }

    public function dashboard()
    {
        $user_id = auth()->user()->id;
        $ads = Ad::where('user_id', '=', "$user_id")->orderBy('id', 'asc')->get();
        return view('/dashboard', compact('ads'));
    }
}
