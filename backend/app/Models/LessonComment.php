<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LessonComment
 * 
 * @property int $id
 * @property string $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $account_id
 * @property int $lesson_id
 * @property int|null $lesson_comment_id
 * 
 * @property Account $account
 * @property LessonComment|null $lesson_comment
 * @property Lesson $lesson
 * @property Collection|LessonComment[] $lesson_comments
 *
 * @package App\Models
 */
class LessonComment extends Model
{
	protected $table = 'lesson_comments';

	protected $casts = [
		'account_id' => 'int',
		'lesson_id' => 'int',
		'lesson_comment_id' => 'int'
	];

	protected $fillable = [
		'content',
		'account_id',
		'lesson_id',
		'lesson_comment_id'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}

	public function lesson_comment()
	{
		return $this->belongsTo(LessonComment::class);
	}

	public function lesson()
	{
		return $this->belongsTo(Lesson::class);
	}

	public function lesson_comments()
	{
		return $this->hasMany(LessonComment::class);
	}
}
