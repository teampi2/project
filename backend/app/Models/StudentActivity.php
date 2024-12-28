<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentActivity
 * 
 * @property int $id
 * @property float $score
 * @property string|null $submission_url
 * @property Carbon|null $submission_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $student_id
 * @property int $activity_id
 * 
 * @property Activity $activity
 * @property Student $student
 *
 * @package App\Models
 */
class StudentActivity extends Model
{
	protected $table = 'student_activities';

	protected $casts = [
		'score' => 'float',
		'submission_date' => 'datetime',
		'student_id' => 'int',
		'activity_id' => 'int'
	];

	protected $fillable = [
		'score',
		'submission_url',
		'submission_date',
		'student_id',
		'activity_id'
	];

	public function activity()
	{
		return $this->belongsTo(Activity::class);
	}

	public function student()
	{
		return $this->belongsTo(Student::class);
	}
}
