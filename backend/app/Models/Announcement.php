<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Announcement
 * 
 * @property int $id
 * @property string $subject
 * @property string $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $account_id
 * @property int $class_id
 * @property int|null $announcement_id
 * 
 * @property Account $account
 * @property Announcement|null $announcement
 * @property Class $class
 * @property Collection|Announcement[] $announcements
 *
 * @package App\Models
 */
class Announcement extends Model
{
	protected $table = 'announcements';

	protected $casts = [
		'account_id' => 'int',
		'class_id' => 'int',
		'announcement_id' => 'int'
	];

	protected $fillable = [
		'subject',
		'content',
		'account_id',
		'class_id',
		'announcement_id'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}

	public function announcement()
	{
		return $this->belongsTo(Announcement::class);
	}

	public function class()
	{
		return $this->belongsTo(Classes::class);
	}

	public function announcements()
	{
		return $this->hasMany(Announcement::class);
	}
}
