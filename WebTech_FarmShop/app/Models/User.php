<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory,Notifiable;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function CheckRole($user){
        $role = $user->role()->first();
       switch ($role->name){
           case 'Admin':
               return 'Admin';
           case 'Moderator':
               return 'Moderator';
            case 'User':
                return 'User';
           default:
               return false;
       }

    }

}

