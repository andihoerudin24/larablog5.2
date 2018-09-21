<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Notifiable;
class Post extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'posts';
    protected $fillable=array('author_id','category_id','title','slug','excerpt','published_at','body','image');
    //protected $guarded = array();

   public function author()
   {
     return $this->belongsTo(User::class);
   }

    public function getImageUrlAttribute($value)
    {
        $imageUrl="";
        if(!is_null($this->image))
        {
            $imagePath=public_path(). "/img/" .$this->image;
            if(file_exists($imagePath)) $imageUrl=asset("img/".$this->image);
        }
        return $imageUrl;
    }
    public function getdateAttribute($value)
    {
        return is_null($this->publihed_at) ? '' : $this->published_at->diffForHumans();
    }

    public function scopeLatestFirst($query)
    {
        return $query->where("published_at","<=",Carbon::now());
    }

    public function scopePublished()
    {
        return $query->where("published_at","<=",Carbon::now());
    }

    public function categoris()
    {
        return $this->belongsTo(Category::class);
        //return $this->belongsTo(User::class);
    }
}
