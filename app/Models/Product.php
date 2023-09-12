<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'short_description', 'description', 'regular_price', 'sale_price', 'SKU', 'stock_status', 'quantity', 'image', 'tag_id', 'category_id'
    ];

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the tag that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->BelongsTo(Tag::class, 'tag_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
