<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LessonPlan
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $objectives
 * @property string|null $materials
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $account_id
 * 
 * @property Account $account
 * @property Lesson $lesson
 *
 * @package App\Models
 */
class LessonPlan extends Model
{
	protected $table = 'lesson_plans';

	protected $casts = [
		'account_id' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'objectives',
		'materials',
		'account_id'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}

	public function lesson()
	{
		return $this->hasOne(Lesson::class);
	}
}
