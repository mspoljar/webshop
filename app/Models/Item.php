<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;



class Item extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = [
        'name',
        'description',
    ];

    protected $fillable=['path','price'];

    public function category()
    {
       return $this->hasOne('app\Models\Category');
    }

    public function itemTranslation()
    {
       return $this->hasMany('App\Models\ItemTranslation');
    }
}
