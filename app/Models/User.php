<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements CanResetPassword
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'user_role',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'refresh_token_key',
        'refresh_token_key_validated_until',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'refresh_token_key_validated_until' => 'datetime',
    ];

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return "email";
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password; 
    }

    /**
     * Get user based on email.
     *
     * @return User
     */
    public function getUserByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Fetch user by Credentials
     *
	 * @param array $credentials
	 * @return Illuminate\Contracts\Auth\Authenticatable
	 */
	public function fetchUserByCredentials(array $credentials)
	{
		$user = $this->where('users', ['email' => $credentials['email']])->first();

		return $user;
	}

	public function passwordIsMatchWith(string $password)
	{
		return Hash::check($password, $this->password);
	}

	public function setPassword(string $password)
	{
		$this->password = Hash::make($password);
	}

	public function anggota()
	{
		return $this->hasMany(Anggota::class);
	}

	public function nstTicket()
	{
		return $this->hasOne(NstTicket::class, 'user_id');
	}

    public function reevaTicket()
	{
		return $this->hasOne(ReevaTicket::class, 'user_id');
	}
}
