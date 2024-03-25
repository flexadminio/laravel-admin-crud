<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Concerns\AttachmentConcern;
use App\Enums\ProductStatus;

class Product extends Model implements HasMedia
{
  use HasFactory;
  use SoftDeletes;
  use InteractsWithMedia;
  use AttachmentConcern;

  /**
   * The attributes that are mass assignable.
   *	
   * @var array
   */
  protected $fillable = [
    'name', 'detail', 'status', 'price', 'quantity', 'charge_tax', 'unit_sold'
  ];

  /**
   * Get all of the tags for the post.
   */
  public function tags(): MorphToMany
  {
    return $this->morphToMany(Tag::class, 'taggable');
  }

  public function categories(): BelongsToMany
  {
    return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
  }

  public function statusName()
  {
    return ProductStatus::getDescription($this->status);
  }
}
