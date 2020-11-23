<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

//    specify every field that you will allowed mass assigned
//    protected $fillable = ['name', 'email', 'active'];

//  this is the opposite fillable
    protected  $guarded = [];

    public function scopeActive(Builder $query)
    {
        return $query->where('active', 1);
    }

    public function scopeInactive(Builder $query)
    {
        return $query->where('active', 0);
    }

    public function company()
    {
      return $this->belongsTo(Company::class);
    }
}
