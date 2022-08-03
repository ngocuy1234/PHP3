<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OptionDetail;

class Option extends Model
{
    use HasFactory;

    protected $table = 'options';
    protected $fillable  = ['id' , 'name' , 'display_types'];

    public function optionDetail(){
        return $this->hasMany(OptionDetail::class ,'option_id' , 'id');
    }
}
