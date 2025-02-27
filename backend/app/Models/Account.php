<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 * 
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string|null $image
 * @property string $status
 * @property string $role
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $role_id
 * 
 * @property Collection|Activity[] $activities
 * @property Collection|ActivityComment[] $activity_comments
 * @property Administrator $administrator
 * @property Collection|Announcement[] $announcements
 * @property Collection|ClassTeacher[] $class_teachers
 * @property Collection|Class[] $classes
 * @property Coordinator $coordinator
 * @property Collection|LessonComment[] $lesson_comments
 * @property Collection|LessonPlan[] $lesson_plans
 * @property Collection|Lesson[] $lessons
 * @property Monitor $monitor
 * @property Collection|School[] $schools
 * @property Student $student
 *
 * @package App\Models
 */
class Account extends Model
{
	protected $table = 'accounts';

	protected $casts = [
		'role_id' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'email',
		'password',
		'image',
		'status',
		'role',
		'role_id'
	];

	public function activities()
	{
		return $this->hasMany(Activity::class);
	}

	public function activity_comments()
	{
		return $this->hasMany(ActivityComment::class);
	}

	public function administrator()
	{
		return $this->hasOne(Administrator::class);
	}

	public function announcements()
	{
		return $this->hasMany(Announcement::class);
	}

	public function class_teachers()
	{
		return $this->hasMany(ClassTeacher::class);
	}

	public function classes()
	{
		return $this->hasMany(Class::class);
	}

	public function coordinator()
	{
		return $this->hasOne(Coordinator::class);
	}

	public function lesson_comments()
	{
		return $this->hasMany(LessonComment::class);
	}

	public function lesson_plans()
	{
		return $this->hasMany(LessonPlan::class);
	}

	public function lessons()
	{
		return $this->hasMany(Lesson::class);
	}

	public function monitor()
	{
		return $this->hasOne(Monitor::class);
	}

	public function schools()
	{
		return $this->hasMany(School::class);
	}

	public function student()
	{
		return $this->hasOne(Student::class);
	}
}
