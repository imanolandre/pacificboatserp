<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 *
 * @property $id
 * @property $customer_name
 * @property $yacht_name
 * @property $location
 * @property $phone
 * @property $email
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Client extends Model
{
    public function setClienteAttribute($value)
    {
        $this->attributes['customer_name'] = ucwords($value);
    }

    static $rules = [
		'customer_name' => 'required',
		'yacht_name' => 'required',
		'location' => 'required',
		'phone' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_name','yacht_name','location','phone','email'];



}
