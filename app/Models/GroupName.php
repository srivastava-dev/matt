<?php 
namespace App\Models;
use CodeIgniter\Model;
class GroupNameModel extends Model
{
    protected $table = 'group_name';
    protected $primaryKey = 'id';
    protected $allowedFields = ['Name', 'created_by'];
}