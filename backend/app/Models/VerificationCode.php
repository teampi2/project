<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VerificationCode
 * 
 * @property int $id
 * @property string $email
 * @property string $code
 * @property Carbon $expires_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class VerificationCode extends Model
{
	protected $table = 'verification_codes';

	protected $casts = [
		'expires_at' => 'datetime'
	];

	protected $fillable = [
		'email',
		'code',
		'expires_at'
	];
}
