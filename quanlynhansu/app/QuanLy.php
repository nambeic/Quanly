<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\QuanLy as Authenticatable;
use Illuminate\Http\Request;
use Validator;
use Auth;

class QuanLy extends Model
{
    protected $table = 'quan_lies';
    protected $fillable = [
         'hoTen', 'diaChi', 'tuoi', 'sdt'
        ];
    public static function index()
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
        return view('DanhSach');
    }
    public static function store($request)
    {
        $form_data = array(           
            'hoTen'        =>  $request->hoTen,
            'diaChi'         =>  $request->diaChi,
            'tuoi'         =>  $request->tuoi,
            'sdt'         =>  $request->sdt,

        );
        QuanLy::create($form_data);
    }

    public static function edit($id)
    {
        if(request()->ajax())
        {
            $data = QuanLy::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public static function update1($request)
    {
        $form_data = array(
            'hoTen'        =>  $request->hoTen,
            'diaChi'         =>  $request->diaChi,
            'tuoi'         =>  $request->tuoi,
            'sdt'         =>  $request->sdt,
        );
        QuanLy::whereId($request->hidden_id)->update($form_data);
    }

    public static function destroy($id)
    {
        $data = QuanLy::findOrFail($id);
        $data->delete();
    }
    public static function show()
    {
       
    }
}
