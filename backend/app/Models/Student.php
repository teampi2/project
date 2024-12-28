<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $enrollment
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int|null $account_id
 * @property int $school_id
 * 
 * @property Account|null $account
 * @property School $school
 * @property Collection|Attendance[] $attendances
 * @property Collection|Class[] $classes
 * @property Collection|StudentActivity[] $student_activities
 *
 * @package App\Models
 */
class Student extends Model
{
	protected $table = 'students';

	protected $casts = [
		'account_id' => 'int',
		'school_id' => 'int'
	];

	protected $fillable = [
		'name',
		'email',
		'enrollment',
		'account_id',
		'school_id'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}

	public function school()
	{
		return $this->belongsTo(School::class);
	}

	public function attendances()
	{
		return $this->hasMany(Attendance::class);
	}

	public function classes()
	{
		return $this->belongsToMany(Classes::class, 'class_students')
					->withPivot('id')
					->withTimestamps();
	}

	public function student_activities()
	{
		return $this->hasMany(StudentActivity::class);
	}
}
