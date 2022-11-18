<?php

namespace App\Controllers\Api;

use Application\Models\HasilModel;
use CodeIgniter\API\ResponseTrait;
use Codeigniter\RESTfull\ResourceController;

class Nilai extends ResourceController
{
    use ResponTrait;

    public function show($id = null)
    {
        $hasil = new Hasil();
        $data = $model->find($id);

        return $this->respond($data);
    }
}