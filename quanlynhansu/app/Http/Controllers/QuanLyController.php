<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanLy;
use Validator;


class QuanLyController extends Controller
{

    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(QuanLy::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('quanly_index');
    }

    public function store(Request $request)
    {
        $rules = array(        
            'hoTen'    =>  'required',
            'diaChi'     =>  'required',
            'tuoi'     =>  'required|numeric',
            'sdt'     =>  'required|numeric',
        );

        $mes = [
            'hoTen.required' => 'Họ không được bỏ trống',
            'diaChi.required' => 'Tên không được bỏ trống',
            'tuoi.required' => 'Tuổi không được bỏ trống',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'sdt.numeric' => 'Số điện thoại phải là số',
            'tuoi.numeric' => 'Tuổi phải là số',
        ];

        $error = Validator::make($request->all(), $rules, $mes);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(           
            'hoTen'        =>  $request->hoTen,
            'diaChi'         =>  $request->diaChi,
            'tuoi'         =>  $request->tuoi,
            'sdt'         =>  $request->sdt,

        );

        QuanLy::create($form_data);

        return response()->json(['success' => 'Thêm thành công.']);
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = QuanLy::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'hoTen'    =>  'required',
            'diaChi'     =>  'required',
            'tuoi'     =>  'required|numeric',
            'sdt'     =>  'required|numeric',
        );

        $mes = [
            'hoTen.required' => 'Họ không được bỏ trống',
            'diaChi.required' => 'Tên không được bỏ trống',
            'tuoi.required' => 'Tuổi không được bỏ trống',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'sdt.numeric' => 'Số điện thoại phải là số',
            'tuoi.numeric' => 'Tuổi phải là số',
        ]; 

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'hoTen'        =>  $request->hoTen,
            'diaChi'         =>  $request->diaChi,
            'tuoi'         =>  $request->tuoi,
            'sdt'         =>  $request->sdt,
        );
        QuanLy::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Chỉnh sửa thành công']);
    }

    public function destroy($id)
    {

    }
}
