<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends Model
{
    use HasFactory;
    protected $table='restaurant';
    public function getAllData(){
        $restaurants=DB::select('SELECT * FROM restaurant ORDER BY create_at DESC ');

        return $restaurants;
    }

    public function addData($data){

        DB::insert('INSERT INTO restaurant (fullname,phone,Address,image,create_at) values (?,?,?,?,?)',$data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id=?',[$id]);
    }

    public function updateData($data,$id){

        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET fullname=? ,phone=? ,Address=? ,image=? ,update_at=? where  id=?',$data);
    }

    public function deleteData($id){
        return DB::delete('DELETE FROM '.$this->table.' where id=?',[$id]);
    }


}
