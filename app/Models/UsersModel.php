<?php 
namespace App\Models;
 
use CodeIgniter\Model;
 
class UsersModel extends Model
{
    protected $table = "users_client";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'name'];
}
?>