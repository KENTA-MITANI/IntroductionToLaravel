<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    // created_at,updated_atを除いて登録
    public $timestamps = false;

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    );

    public function getData()
    {
        return $this->id . '：' .  $this->name . '（' . $this->age . '）';
    }

    public function boards()
    {
        return $this->hasMany('App\Models\Board');
    }
}
