<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClassTeacher
 * 
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $account_id
 * @property int $class_id
 * 
 * @property Account $account
 * @property Class $class
 *
 * @package App\Models
 */
class ClassTeacher extends Model
{
	protected $table = 'class_teachers';

	protected $casts = [
		'account_id' => 'int',
		'class_id' => 'int'
	];

	protected $fillable = [
		'account_id',
		'class_id'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}

	public function class()
	{
		return $this->belongsTo(Classes::class);
	}
}
