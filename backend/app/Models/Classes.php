<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Class
 * 
 * @property int $id
 * @property string $name
 * @property string $shift
 * @property string $academic_year
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $account_id
 * @property int $school_id
 * 
 * @property Account $account
 * @property School $school
 * @property Collection|Activity[] $activities
 * @property Collection|Announcement[] $announcements
 * @property Collection|Student[] $students
 * @property Collection|ClassTeacher[] $class_teachers
 * @property Collection|Lesson[] $lessons
 *
 * @package App\Models
 */
class Classes extends Model
{
	protected $table = 'classes';

	protected $casts = [
		'account_id' => 'int',
		'school_id' => 'int'
	];

	protected $fillable = [
		'name',
		'shift',
		'academic_year',
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

	public function activities()
	{
		return $this->hasMany(Activity::class);
	}

	public function announcements()
	{
		return $this->hasMany(Announcement::class);
	}

	public function students()
	{
		return $this->belongsToMany(Student::class, 'class_students')
					->withPivot('id')
					->withTimestamps();
	}

	public function class_teachers()
	{
		return $this->hasMany(ClassTeacher::class);
	}

	public function lessons()
	{
		return $this->hasMany(Lesson::class);
	}
}
