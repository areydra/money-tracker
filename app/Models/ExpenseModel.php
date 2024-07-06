<?php 
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'expenses';

    protected $primaryKey = 'id';

    protected $allowedFields = ['note', 'amount', 'date'];
}