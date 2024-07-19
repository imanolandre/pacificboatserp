<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Week
 *
 * @property $id
 * @property $customer_name
 * @property $yacht_name
 * @property $location
 * @property $date
 * @property $color
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Week extends Model
{

    static $rules = [
		'customer_name' => 'required',
		'yacht_name' => 'required',
		'location' => 'required',
		'date' => 'required',
		'color' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_name','yacht_name','location','date','color'];



}
