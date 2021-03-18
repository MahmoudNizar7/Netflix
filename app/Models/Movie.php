<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Storage;


    /**
     * @method static whenSearch($search)
     * @method static whenCategory($category)
     */
    class Movie extends Model
    {
        use HasFactory;

        protected $fillable = ['name', 'description', 'path', 'rating', 'year', 'poster', 'image', 'percent'];

        protected $appends = ['poster_path', 'image_path'];

        // attributes-----------------------------------------------------------------
        public function getPosterPathAttribute(): string
        {
            return Storage::url('images/' . $this->poster);
        }

        public function getImagePathAttribute(): string
        {
            return Storage::url('images/' . $this->image);
        }

        // relations------------------------------------------------------------------
        public function categories()
        {
            return $this->belongsToMany(Category::class, 'movie_category');
        }

        // scopes---------------------------------------------------------------------
        public function scopeWhenSearch($query, $search)
        {
            return $query->when($search, function ($q) use ($search) {
                return $q->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%")
                    ->orWhere('year', 'like', "%$search%")
                    ->orWhere('rating', 'like', "%$search%");
            });
        }

        public function scopeWhenCategory($query, $category)
        {
            return $query->when($category, function ($q) use ($category) {

                return $q->whereHas('categories', function ($qu) use ($category) {

                    return $qu->whereIn('category_id', (array)$category)
                        ->orWhere('name', (array)$category);

                });

            });
        }
    }
