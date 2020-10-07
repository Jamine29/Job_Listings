<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyUsers extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId', 
        'companyId'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * Defines the relationship to user
     */
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * Defines the relationship to company
     */
    public function companies() {
        return $this->belongsToMany('App\Models\Company');
    }
}
