<?php

namespace App\Http\Controllers;
use App\Http\Requests\checkInput;
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
    public function show()
    {
        return QuanLy::show();
    }
    public function store(checkInput $request)
    {
        QuanLy::store($request);
        return response()->json(['success' => 'Thêm thành công.']);
    }
    public function edit($id)
    {
        return QuanLy::edit($id);
    }
    public function update(checkInput $request)
    {
        QuanLy::update1($request);
        return response()->json(['success' => 'Chỉnh sửa thành công']);
    }
    public function destroy($id)
    {
        return QuanLy::destroy($id);
    }
}
