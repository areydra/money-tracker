<?php 
namespace App\Models;
use CodeIgniter\Model;

class ExpenseModel extends Model
{
    protected $table = 'expenses';

    protected $primaryKey = 'id';

    protected $allowedFields = ['note', 'amount', 'date'];
}