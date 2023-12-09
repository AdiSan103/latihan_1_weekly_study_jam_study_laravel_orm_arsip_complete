<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;

    protected $table = "blog";
    protected $primaryKey = "id";
    protected $fillable = ["judul","image","description","id_category"];

    // https://laravel.com/docs/10.x/eloquent-relationships#one-to-one
    public function category() {
        // parameter -> DB
        // local id dari target DBnya
        // foreign key dari BlogModel
        return $this->hasOne(CategoryModel::class,'id','id_category');
    }
}
