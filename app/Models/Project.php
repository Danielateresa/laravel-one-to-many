<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['cover_img','title','slug','type_id','description'];

    public static function createSlug($title)
    {
        $project_slug = Str::slug($title);
        return $project_slug;
    }

     /**
     * Get all of the posts for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);//un progetto può appartenere a una categoria
    }
}