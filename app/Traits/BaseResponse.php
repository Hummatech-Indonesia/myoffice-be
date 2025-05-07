<?php
 
namespace App\Traits;

trait BaseResponse {
    
    public function succesResponse($data, $kode = 200) {
        return [
            'sukses' => true,
            'kode' => $kode,
            'data' => $data
        ];
    }

    public function errorResponse($pesan, $kode = 400) {
        return [
            'sukses' => false,
            'kode' => $kode,
            'pesan' => $pesan,
        ];
    }

}
