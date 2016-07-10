<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \LaravelAcl\Authentication\Models\User;
use App;


class Users extends User {
    
    public function getUserByUID($uid) {
        $user = self::where('uid', $uid)->first();
        return $user;
    }
    public function exportListUser($params = array()) {
        $users = self::join('user_profile', 'users.id', '=', 'user_profile.user_id')
                ->select('users.uid', 'users.email', 'user_profile.first_name', 'user_profile.last_name')
                ->orderBy('users.uid', 'ASC')->get();
        return $users;
    }
    
    public function getUserProfileByUID($uid) {
        $user = self::join('user_profile', 'users.id', '=', 'user_profile.user_id')
                ->select('users.id', 'users.uid', 'users.email', 'user_profile.first_name', 'user_profile.last_name')
                ->where('uid', $uid)->first();
        return $user;
    }
}