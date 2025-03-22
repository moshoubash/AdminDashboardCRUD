<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug',
        'description',  // Description field
        'status',       // Status field
        'parent_id',    // Parent category field
        'image',        // Image field
        'meta_title',   // Meta title field
        'meta_description',  // Meta description field
        'created_by',   // Creator field
    ];

    // Automatically generate the slug from the name
    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            // Generate slug from name if not already provided
            if (!$category->slug) {
                $category->slug = \Str::slug($category->name);
            }
        });
    }

    // Define the relationship to self for parent-child categories
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Define the relationship for child categories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Define the relationship to the user who created the category (if needed)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
