<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Storage;


    /**
     * @method static whenSearch($search)
     * @method static whenCategory($category)
     * @method static whenFavorite($favorite)
     */
    class Movie extends Model
    {
        use HasFactory;

        protected $fillable = ['name', 'description', 'path', 'rating', 'year', 'poster', 'image', 'percent'];

        protected $appends = ['poster_path', 'image_path', 'is_favored'];

        // attributes-----------------------------------------------------------------
        public function getPosterPathAttribute(): string
        {
            return Storage::url('images/' . $this->poster);
        }

        public function getImagePathAttribute(): string
        {
            return Storage::url('images/' . $this->image);
        }

        public function getIsFavoredAttribute()
        {
            if (auth()->user()) {

                return $this->users()->where('user_id', auth()->user()->id)->count();

            }

            return false;
        }

        // relations------------------------------------------------------------------

        public function users()
        {
            return $this->belongsToMany(User::class, 'user_movie');
        }

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

        public function scopeWhenFavorite($query, $favorite)
        {

            return $query->when($favorite, function ($q) {

                return $q->whereHas('users', function ($qu) {

                    return $qu->where('user_id', auth()->user()->id);

                });

            });

        }
    }
