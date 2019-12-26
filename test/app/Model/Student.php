<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{
//    指定表名
    protected $table = 'Student';
//指定id
    protected $primaryKey = 'id';
//    自动维护时间戳
    public $timestamps = false;
//    指定数据可以批量添加
    public $fillable = ['name','age'];
}
