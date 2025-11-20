<?php
namespace App\Models;
use CodeIgniter\Model;

class PublicationModel extends Model
{
    protected $table         = 'publications';      // nombre tab tabla (plural)
    protected $primaryKey    = 'id';
    protected $allowedFields = ['user_id','content']; // TU columna user_id

    // opcional, similar al PDF:
    public function get($id = false)
    {
        if ($id === false) return $this->findAll();
        return $this->where('id', $id)->first();
    }
}
