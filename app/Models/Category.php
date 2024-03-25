<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
  use HasFactory;

  public function setNameAttribute($value)
  {
    $this->attributes['name'] = $value;
    $this->attributes['slug'] = str_slug($value);
  }

  /**
   * The attributes that are mass assignable.
   *	
   * @var array
   */
  protected $fillable = [
    'name'
  ];

  protected $orderable = [
    'id',
    'name',
    'created_at'
  ];

  public function products(): BelongsToMany
  {
    return $this->belongsToMany(Product::class);
  }
}
