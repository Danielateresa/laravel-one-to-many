<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['cover_img','title','slug','description'];

    public static function createSlug($title)
    {
        $project_slug = Str::slug($title);
        return $project_slug;
    }
}