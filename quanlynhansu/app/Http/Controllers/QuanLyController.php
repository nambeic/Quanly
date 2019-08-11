<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanLy;
use Validator;


class QuanLyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(        
            'hoTen'    =>  'required',
            'diaChi'     =>  'required',
            'tuoi'     =>  'required',
            'sdt'     =>  'required',
        );

        $mes = [
            'hoTen.required' => 'Họ không được bỏ trống',
            'diaChi.required' => 'Tên không được bỏ trống',
            'tuoi.required' => 'Tuổi không được bỏ trống',
            'sdt.required' => 'sdt không được bỏ trống',
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
