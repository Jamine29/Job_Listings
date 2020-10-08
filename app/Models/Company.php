<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'address',
        'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Defines the relationship to jobs.
     */
    public function jobs() 
    {
        return $this->hasMany('App\Models\Job');
    }


    /**
     * Defines the relationship to users.
     */
    public function users() 
    {
        return $this->belongsToMany('App\Models\User', 'company_user', 'companyId', 'userId')
                        ->withTimestamps()
                        ->withPivot(['isManager'])
                        ->as('company_user');
    }

    /**
     * Get all Managers of the Company.
     */
    public function managers() 
    {
        return $this->belongsToMany('App\Models\User', 'company_user', 'companyId', 'userId')
                        ->withTimestamps()
                        ->withPivot(['isManager'])
                        ->where('isManager', 1 );
    }
}
