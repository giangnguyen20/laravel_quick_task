<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offices extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offices';

    protected $fillable = ['id', 'user_id', 'content'];

    public $timestamps = true;
    /**
     * Get the comments for the blog post.
     */
    public function users()
    {
        return $this->hasMany('App/User');
    }
}
