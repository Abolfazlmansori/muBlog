<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;


class Category extends Model
{
    use HasPersianSlug,softDeletes;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected $fillable =
        [
            'name',
            'slug',
            'parent_id',
        ];

    public function ParentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class,'parent_id','id')->withDefault(['name'=>'دسته بندی اصلی']);
    }
    public function ChildCategory()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function article()
    {
        return $this->hasMany(Article::class);
    }
    public static function getCategory()
    {
        $array = [];
        $categories = self::query()->with('ChildCategory')->where('parent_id',0)->get();
        foreach ($categories as $category1) {
            $array[$category1->id] = $category1->name;
            foreach ($category1->ChildCategory as $category2) {
                $array[$category2->id] = '-' . $category2->name;
                foreach ($category2->ChildCategory as $category3) {
                    $array[$category3->id] = '--' . $category3->name;
                }
            }
        }
        return $array;
    }

    public function article_count($category_id)
    {
        return Article::query()->where('category_id',$category_id)->count();
    }
}
