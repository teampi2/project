<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActivityComment
 * 
 * @property int $id
 * @property string $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $account_id
 * @property int $activity_id
 * @property int|null $activity_comment_id
 * 
 * @property Account $account
 * @property ActivityComment|null $activity_comment
 * @property Activity $activity
 * @property Collection|ActivityComment[] $activity_comments
 *
 * @package App\Models
 */
class ActivityComment extends Model
{
	protected $table = 'activity_comments';

	protected $casts = [
		'account_id' => 'int',
		'activity_id' => 'int',
		'activity_comment_id' => 'int'
	];

	protected $fillable = [
		'content',
		'account_id',
		'activity_id',
		'activity_comment_id'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}

	public function activity_comment()
	{
		return $this->belongsTo(ActivityComment::class);
	}

	public function activity()
	{
		return $this->belongsTo(Activity::class);
	}

	public function activity_comments()
	{
		return $this->hasMany(ActivityComment::class);
	}
}
