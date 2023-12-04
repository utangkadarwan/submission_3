<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index () {
        $data = [
            [
                'nama' => 'utangkadarwan',
                'email' => 'kadarwan82@gmail.com',
                'telp' => '081322000327',
                'alamat' => [
                    'street' => 'kp. pasung',
                    'postcode' => '40971'
                ]
            ],
            [
                'nama' => 'wawan',
                'email' => 'wawan@gmail.com',
                'telp' => '081322000000',
                'alamat' => [
                    'street' => 'jl. kopo',
                    'postcode' => '40226'
                ]
            ],
            [
                'nama' => 'khawa',
                'email' => 'khawa@gmail.com',
                'telp' => '089322000327',
                'alamat' => [
                    'street' => 'jl. kopo soreang',
                    'postcode' => '40941'
                ]
            ]
        ];

        $data2 = [
            [
                'nama' => 'kadarwan',
                'email' => 'kadarwan@gmail.com',
                'telp' => '40228',
                'alamat' => [
                    'street' => 'jl. soreang',
                    'postcode' => '40229'
                ]
            ]
        ];

        // debug string
        // echo('sdsdsd');

        //debug string / array
        // var_dump($data);
        dd($data);

        $data = array_merge($data, $data2);

        $id = '111';
        return view('users/user', compact('data', 'id'));

    }

    public function post() {

    }









    public function getDataUser(Request $request) {


    }

    public function createDataUser(Request $request) {
        $post = $request->post();
        $arr = [];
        $arr['username'] = $request->post('username');
        $arr['email'] = $request->post('email');
        $arr['no_telp'] = $request->post('no_telp');

        $isValid = self::cekUser($arr['username']);
        if ($isValid){
            $res['status'] = true;
            $res['message'] = 'Username Valid!';
            $code = 200;
        } else {
            $res['status'] = false;
            $res['message'] = 'Username Tidak Valid!';
            $code = 401;
        }

        //Contoh response json
        return response()->json($res, $code);
    }

    private static function cekUser($username) {
        if ($username == 'wawan') {
            return true;
        } else {
            return false;
        }
    }

    public function updateDataUser(Request $request) {
        $post = $request->post();
        $arr = [];
        $arr['username'] = $request->post('username');
        $arr['email'] = $request->post('email');
        $arr['no_telp'] = $request->post('no_telp');

        //Buat response seperti ketika insert, silahkan improve sendiri

        return response()->json($arr, 200);
    }

    public function deleteDataUser(Request $request) {
        $arr = [];
        $arr['username'] = $request->get('username');

        $isValid = self::cekUser($arr['username']);
        if ($isValid){
            $res['status'] = true;
            $res['message'] = 'Data berhasil dihapus!';
            $code = 200;
        } else {
            $res['status'] = false;
            $res['message'] = 'Data tidak ditemukan / username tidak valid!';
            $code = 401;
        }

        return response()->json($res, $code);
    }
}
