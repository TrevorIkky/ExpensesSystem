<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Crockery extends Model
{
    //
public  function getData($crockeryid){
 if($crockeryid==0){
     $value=DB::table('crockery')->orderBy('crockeryid','asc');
 }else{
    $value=DB::table('crockery')->where('crockeryid','$crockeryid')->first();
 }
 return $value;
}

public function insertData($data){
 $value=DB::table('crockery')->where('crockeryname',$data['crockeryname'])->get();
 if($value->count()==0){
     DB::table('crockery')->insert($data);
     return 1;
 }else{
     return 0;
 }
}

public static function updateData($crockeryid,$data)
{
   DB::table('crockery')
   ->where('crockeryid','$crockeryid')
   ->update($data);

}

public static function deleteData($crockeryid){
   DB::table('crockery')->where('crockeryid','=',$crockeryid)->delete();
}

}
