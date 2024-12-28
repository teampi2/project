<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property float $max_score
 * @property Carbon $due_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $account_id
 * @property int $class_id
 * 
 * @property Account $account
 * @property Class $class
 * @property Collection|ActivityComment[] $activity_comments
 * @property Collection|StudentActivity[] $student_activities
 *
 * @package App\Models
 */
class Activity extends Model
{
	protected $table = 'activities';

	protected $casts = [
		'max_score' => 'float',
		'due_date' => 'datetime',
		'account_id' => 'int',
		'class_id' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'max_score',
		'due_date',
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

	public function activity_comments()
	{
		return $this->hasMany(ActivityComment::class);
	}

	public function student_activities()
	{
		return $this->hasMany(StudentActivity::class);
	}
}
