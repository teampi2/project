<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lesson
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property Carbon $date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $account_id
 * @property int $lesson_plan_id
 * @property int $class_id
 * 
 * @property Account $account
 * @property Class $class
 * @property LessonPlan $lesson_plan
 * @property Collection|Attendance[] $attendances
 * @property Collection|LessonComment[] $lesson_comments
 *
 * @package App\Models
 */
class Lesson extends Model
{
	protected $table = 'lessons';

	protected $casts = [
		'date' => 'datetime',
		'account_id' => 'int',
		'lesson_plan_id' => 'int',
		'class_id' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'date',
		'account_id',
		'lesson_plan_id',
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

	public function lesson_plan()
	{
		return $this->belongsTo(LessonPlan::class);
	}

	public function attendances()
	{
		return $this->hasMany(Attendance::class);
	}

	public function lesson_comments()
	{
		return $this->hasMany(LessonComment::class);
	}
}
