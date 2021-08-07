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
    protected $guarded = [];

    //    Set a default value in atribute
    protected $attributes = [
        'active' => 1,
    ];

    //    Access mutators  https://laravel.com/docs/8.x/eloquent-mutators
    public function getActiveAttribute($value)
    {
        return $this->activeOptions()[$value];
    }

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

    public function activeOptions()
    {
        return [
            1 => 'Active',
            0 => 'Inactive',
        ];
    }

    public function getCompanyId()
    {
        return $this->exists
            ? $this->company->id
            : null;
    }
}
