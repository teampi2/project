<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Monitor
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int|null $account_id
 * 
 * @property Account|null $account
 *
 * @package App\Models
 */
class Monitor extends Model
{
	protected $table = 'monitors';

	protected $casts = [
		'account_id' => 'int'
	];

	protected $fillable = [
		'name',
		'email',
		'account_id'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}
}
