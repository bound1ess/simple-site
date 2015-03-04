<?php namespace Frostbite;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'parent_id'];

    /**
     * @return object
     */
    public function posts()
    {
        return $this->hasMany('Frostbite\Category');
    }
}
