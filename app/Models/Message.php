<?php

namespace App\Models;

use CodeIgniter\Model;

class Message extends Model
{
	protected $table                = 'messages';
	protected $primaryKey           = 'id';

	protected $allowedFields        = ['user_id', 'message'];

}
