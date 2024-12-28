<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClassStudent
 * 
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $student_id
 * @property int $class_id
 * 
 * @property Class $class
 * @property Student $student
 *
 * @package App\Models
 */
class ClassStudent extends Model
{
	protected $table = 'class_students';

	protected $casts = [
		'student_id' => 'int',
		'class_id' => 'int'
	];

	protected $fillable = [
		'student_id',
		'class_id'
	];

	public function class()
	{
		return $this->belongsTo(Class::class);
	}

	public function student()
	{
		return $this->belongsTo(Student::class);
	}
}
