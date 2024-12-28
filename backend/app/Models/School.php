<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class School
 * 
 * @property int $id
 * @property string $name
 * @property string $cnpj
 * @property string $address
 * @property string $email
 * @property string|null $phone
 * @property string|null $image_url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $account_id
 * 
 * @property Account $account
 * @property Collection|Class[] $classes
 * @property Collection|Student[] $students
 *
 * @package App\Models
 */
class School extends Model
{
	protected $table = 'schools';

	protected $casts = [
		'account_id' => 'int'
	];

	protected $fillable = [
		'name',
		'cnpj',
		'address',
		'email',
		'phone',
		'image_url',
		'account_id'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}

	public function classes()
	{
		return $this->hasMany(classes::class);
	}

	public function students()
	{
		return $this->hasMany(Student::class);
	}
}
