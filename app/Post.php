<?php namespace Frostbite;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var boolean
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = ['title', 'contents', 'category_id', 'is_important'];

}
