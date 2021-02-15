<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function musics(){
        return $this->belongsToMany('App\Models\Music', 'music_user', 'user_id', 'music_id');
    }

    public function saveUser($request){
        if($request->name) {
            $this->name = $request->name;
        }
        if($request->email) {
            $this->email = $request->email;
        }
        if($request->date_of_birth) {
            $this->date_of_birth = $request->date_of_birth;
        }
        if($request->image_url) {
            $this->image_url = $request->image_url;
        }
        if($request->password) {
            $this->password = bcrypt($request->password);
        }
        $this->save();
    }
}
