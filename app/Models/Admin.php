<?php


namespace App\Models;

use App\Traits\ManipulateBy;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable, ManipulateBy;

    const AdminRole = [
        1=>'Super Admin',
        2=>'Admin',
        3=>'Editor'
    ];

    const AdminStatus = [
        0=>'Delete',
        1=>'Active',
        2=>'Block'
    ];

    protected $guard = 'admin';

    protected $table = 'admins';

    protected $primaryKey = 'admin_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'user_name',
        'email',
        'phone_no',
        'admin_role',
        'admin_status',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends =[
        'avatar'
    ];

    public function getRoleAttribute(){
        return Self::AdminRole[$this->attributes['admin_role']];
    }


    public function getAvatarAttribute(){
        return $path = asset('assets/images/admin.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }



    public function scopeIsActive($query){
        return $query->where('admin_status', config('app.active'));
    }

    public function scopeIsDelete($query){
        return $query->where('admin_status', config('app.delete'));
    }

    public function scopeRole($query, $role){
        return $query->where('admin_role', $role);
    }

    public function scopeIsSuperAdmin($query){
        return $query->where('admin_role', 1);
    }

}
