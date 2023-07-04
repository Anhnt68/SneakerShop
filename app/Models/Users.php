<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination;
use Illuminate\Database\Eloquent\Model;
// use Nette\Utils\Paginator

use App\Models\Groups;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';


    // public function getAllUsers($filter = [], $keywords = null, $sortByArr = null, $perPage = null)
    // {
    //     // $users = DB::select('SELECT * FROM users ORDER BY fullName DESC');
    //     // DB::enableQueryLog();

    //     $users = DB::table($this->table)
    //         ->select('users.*', 'groups.name as group_name')
    //         ->join('groups', 'users.groups_id', '=', 'groups.id');

    //     $orderBy = 'users.create_at';
    //     $orderType = 'desc';
    //     if (!empty($sortByArr) && is_array($sortByArr)) {
    //         if (!empty($sortByArr['sortBy']) && !empty($sortByArr['sortType'])) {
    //             $orderBy = trim($sortByArr['sortBy']);
    //             $orderType = trim($sortByArr['sortType']);
    //         }
    //     }
    //     $users = $users->orderBy($orderBy, $orderType);
    //     if (!empty($filter)) {
    //         $users = $users->where($filter);
    //     }
    //     if (!empty($keywords)) {
    //         $users = $users->where(function ($query) use ($keywords) {
    //             $query->orWhere('fullName', 'like', '%' . $keywords . '%');
    //             $query->orWhere('email', 'like', '%' . $keywords . '%');
    //         });
    //     }
    //     if (!empty($perPage)) {
    //         $users = $users->paginate($perPage)->withQueryString(); // 3 bản ghi trên 1 trang
    //     } else {
    //         $users = $users->get();
    //     }
    //    // $sql = DB::getQueryLog();
    //     // dd($sql);

    //     return $users;
    // }
    // public function addUser($data)
    // {
    //     // DB::insert('INSERT INTO users(fullName,email,create_at) VALUES(?,?,?)', $data);
    //     return DB::table($this->table)->insert($data);
    // }
    // public function getUser($id)
    // {
    //     return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    // }
    // public function updateUser($data, $id)
    // {
    //     // $data[] = $id;
    //    // return DB::update('UPDATE ' . $this->table . ' SET fullName = ?, email=?,update_at = ? where id = ?', $data);
    //     return DB::table($this->table)->where('id', $id)->update($data);
    // }
    // public function deleteUser($id)
    // {
    //     // return DB::delete("DELETE FROM $this->table WHERE id = ?", [$id]);
    //     return DB::table($this->table)->where('id', $id)->delete();
    // }
    // public function statementUser($sql)
    // {
    //     return DB::statement($sql);
    // }


    public function get_order()
    {
        return $this->hasMany(Orders::class, 'user_id', 'id');
    }

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'role_id'
    ];

    public function groups()
    {
        return $this->belongsTo(Groups::class, 'role_id', 'id');
    }

    public function scopeSearch($query)
    {
        if (request()->keywords) {
            $query = $query->where('name', 'like', "%" . request()->keywords . '%');
        }
        return $query;
    }
}
