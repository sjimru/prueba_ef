<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Exceptions\CustomException;
use App\Exceptions\Handler;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
		'id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function __construct($id){

		// Array example users
        $aUsers = array(
			'0' => array(
							'id' => 0,
							'name' => 'Antonio Marquez',
							'email' => 'amarquez@gmail.com',
							'password' => '3f1b7ccad63d40a7b4c27dda225bf941',
						),
			'1' => array(
							'id' => 1,
							'name' => 'Manuel Olmedo',
							'email' => 'molmedo@hotmail.com',
							'password' => '96080775c113b0e5c3e32bdd26214aec',
						),
			'2' => array(
							'id' => 2,
							'name' => 'Isabel Urraca',
							'email' => 'isurraca@gmail.com',
							'password' => '5afb9bcb73acf95a28aa35dbd9acdbda',
						),
			'3' => array(
							'id' => 3,
							'name' => 'Marina Tellez',
							'email' => 'mtellez@hotmail.com',
							'password' => 'aa466f29a42582d133bc36c9a227c118',
						),
		);
		try {
			$this->fillable = $aUsers[$id];
		} catch (\Throwable $th) {
			throw new CustomException('204','User does not exist') ;
		}
    }



	/**
	 * Getter Id
	 * 
	 * @return Int
	 */
	public function getId()
	{
		return $this->fillable['id'];
	}

	/**
	 * Getter name
	 * 
	 * @return string
	 */
	public function getName()
	{
		return $this->fillable['name'];
	}

	/**
	 * Getter email
	 * 
	 * @return string
	 */
	public function getEmail()
	{
		return $this->fillable['email'];
	}
}
