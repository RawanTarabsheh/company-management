<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function getLogoPathAttribute()
    {
            $logo = config('custom.aws_cdn_url').'storage/uploads/companies/images/'. $this->logo;
        return $logo;
    }
    public function employees() {
        return $this->hasMany(Employee::class);
    }
}
