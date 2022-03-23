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

    protected $fillable = ['user_id', 'content'];

    /**
     * Get the comments for the blog post.
     */
    public function users()
    {
        return $this->hasMany('App/User');
    }

}
