<?php namespace Frostbite;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model {

    /**
     * @var string
     */
    protected $table = 'uploads';

    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'path', 'visible'];
}
