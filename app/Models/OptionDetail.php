<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Option;

class OptionDetail extends Model
{
    use HasFactory;
    public $table =  'option_details';
    public $fillable =  ['id' , 'name' , 'code_color' ,'option_id'];

    public function option(){
        return $this->belongsTo(Option::class ,'option_id');
    }

    public function productOptionDetail(){
        return $this->hasMany(\App\Models\productOptionDetail::class ,'option_detail_id');
    }
}
