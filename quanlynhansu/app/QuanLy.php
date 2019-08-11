<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanLy extends Model
{
    protected $fillable = [
         'anh', 'hoTen', 'diaChi', 'tuoi', 'sdt'
        ];
}
