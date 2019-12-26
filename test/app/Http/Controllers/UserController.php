<?php
namespace App\Http\Controllers;

use App\Model\Member;
use App\Model\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use phpDocumentor\Reflection\Location;

class UserController extends Controller{
    public function info(){
        return Member::getuser();
    }
//    第一种DB类操作
    public function db1(){
//        增加操作
        $res = DB::insert('insert into student(name,age) values(?,?)',['sun',19]);
        var_dump($res);
//        查询操作
        $res = DB::select('select * from student');
        var_dump($res);
//        更新操作
        $res = DB::update('update student set age = ? where id= ?',[17,1]);
        var_dump($res);
//        删除操作
        $res = DB::delete('delete from student where id=2');
        var_dump($res);
    }
//    第二种DB类操作
    public function query(){
//        增加操作
//        $res = DB::table('student')->insert([['name'=>'sums','age'=>16],['name'=>'sss','age'=>16]]);
//        var_dump($res);
//        更新操作
//        $res = DB::table('student')->where('id',3)->update(['age'=>16]);
//        自增3
//        $res = DB::table('student')->where('id',3)->increment('age',3);
//        自减3
//          $res = DB::table('student')->where('id',3)->decrement('age',3);
//          var_dump($res);
//        删除操作
//        $res = DB::table('student')->where('id',3)->delete();
//        var_dump($res);
//        查找操作
//        $res = DB::table('student')->get();
//        $res = DB::table('student')->orderBy('id','desc')->first();
//        $res = DB::table('student')->orderBy('id','desc')->get();
//        单条件查询
//        $res = DB::table('student')->where('id','>',1)->get();
//        多条件查询
//        $res = DB::table('student')->whereRaw('id>=? and age>?',[1,3])->get();
//        限定查询一个结果
//        $res = DB::table('student')->pluck('name');
//        限定查询结果
//        $res  = DB::table('student')->select('id','name','age')->get();
//        chunk 分段查询
//        echo '<pre>';
//       DB::table('student')->orderBy('id')->chunk(2,function ($student){
//            var_dump($student);
//        });

    }
//    聚合函数
    public function funcs(){
//        $res = DB::table('student')->count('id');
        $res = DB::table('student')->max('age');
//        min,avg,sum
        dd($res);
    }
//    ORM 查找数据库
    public function orm(){
        $arr =  Student::all();
//        $arr = Student::find(4);
//        $arr = Student::findOrFAIL(10);
//            $arr = Student::where('id','>',1)->orderBy('id','desc')->get();
//        $arr = Student::first();
//        echo '<pre>';
//        $arr = Student::chunk(2,function ($res){
//            var_dump($res);
//        });
        dd($arr);
    }
//    ORM2 新增数据
    public function orm2(){
        #1第一种新增方法
//        $student = new Student();
//        $student->name = '特南克斯';
//        $student->age = 18;
//        $res = $student->save();
//        2.使用模型create 添加数据
//        $res = Student::create(['name'=>'小兰','age'=>10]);
        #3.使用firstOrCreate来添加
//        $res = Student::firstOrCreate(['name'=>'夏明']);
        #4.以属性查找新的用户,若没有则建立新的实例
//        $res = Student::firstOrNew(['name'=>'悟空']);
//        $result =  $res->save();
//        dd($result);
    }
//    orm 修改数据
    public function orm3(){
        #通过模型更新数据
//        $student = Student::find(1);
//        $student->name = '消防';
//        $student->save();
        #批量更新
        $res = Student::where('id','1')->update(['name'=>'校方','age'=>15]);
        dd($res);
    }
//    orm 删除数据
    public function orm4(){
        #通过获得模型删除数据
//        $student = Student::find(1);
//        $student->delete();
        #通过主键删除
//        $res = Student::destroy(4);
        # 通过条件删除
        $res = Student::where('id','7')->delete();
        var_dump($res);
    }
//    遍历数据
    public function show(){
        $data =  Student::all();
        return view('user')->with('data',$data);
    }
//删除
    public function del($id){
        $data = Student::destroy($id);
        if ($data){
            return redirect('user');
        }
    }
//    增加
    public function add(){
        unset($_GET['_token']);
        if ($_GET['sex']=='男'){
            $_GET['sex']=1;
        }else{
            $_GET['sex']=2;
        }
        $res = Student::create($_GET);
        if ($res){
            echo '添加成功';
            return redirect('user');
        }else{
            echo '添加失败';
        }
    }
//    展示单个
    public function edit($id){
        $data = Student::find($id);
        return \view('edit')->with('data',$data)->with('id',$id);
    }
    //编辑
    public function doedit($id){
        unset($_GET['_token']);
        if ($_GET['sex']=='男'){
            $_GET['sex']=1;
        }else{
            $_GET['sex']=2;
        }
//        $res = DB::table('student')->where('id',$id)->update($_GET);
        $res = Student::where('id',$id)->update($_GET);
        if ($res){
            echo '修改成功';
            return redirect('user');
        }else{
            echo '修改失败';
        }
    }
}
