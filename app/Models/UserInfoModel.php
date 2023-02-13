<?php 
namespace App\Models;
use CodeIgniter\Model;
class UserInfoModel extends Model
{
    protected $table = 'user_info';
    protected $primaryKey = 'id';
    protected $allowedFields = ['Groupid', 'G_id','name','Date','description'];
    public function bulkInsert($data) {
        return $this->db
                        ->table($this->table_name)
                        ->insertBatch($data);
    }

}