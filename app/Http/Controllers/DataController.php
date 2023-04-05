<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreexpRequest;
use App\Http\Requests\UpdateexpRequest;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data_barang=Barang::all();
        return view('barang.index',compact('data_barang'), ['user'=>$user]);
    }
}
