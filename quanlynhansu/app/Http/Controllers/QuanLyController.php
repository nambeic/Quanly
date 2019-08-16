<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanLy;
use Validator;
use Illuminate\Support\Facedes\Auth;


class QuanLyController extends Controller
{
    public function __construct() {
        $this->middleware('auth',['except' => 'getLogout']);
    }
    public function index()
    {
        return QuanLy::index();
    }
    public function store(Request $request)
    {
        return QuanLy::store($request);
    }
    public function edit($id)
    {
        return QuanLy::edit($id);
    }
    public function update(Request $request)
    {
        return QuanLy::update1($request);
    }
    public function destroy($id)
    {
        return QuanLy::destroy($id);
    }
}
