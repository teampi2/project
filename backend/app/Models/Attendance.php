<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Attendance
 * 
 * @property int $id
 * @property bool $is_present
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $student_id
 * @property int $lesson_id
 * 
 * @property Lesson $lesson
 * @property Student $student
 *
 * @package App\Models
 */
class Attendance extends Model
{
	protected $table = 'attendances';

	protected $casts = [
		'is_present' => 'bool',
		'student_id' => 'int',
		'lesson_id' => 'int'
	];

	protected $fillable = [
		'is_present',
		'student_id',
		'lesson_id'
	];

	public function lesson()
	{
		return $this->belongsTo(Lesson::class);
	}

	public function student()
	{
		return $this->belongsTo(Student::class);
	}
}
