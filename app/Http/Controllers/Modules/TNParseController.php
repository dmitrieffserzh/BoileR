<?php
/**
 * Created by PhpStorm.
 * User: dmitriev
 * Date: 16.08.2019
 * Time: 11:25
 */

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TNParseController extends Controller {

    public function index(){
        return view('modules.TNParse.index');
    }


    public function upload(Request $request) {

        if($request->ajax() && $request->isMethod('post')) {


            if ($request->hasFile('file')) {

                $file = $request->file('file');
                $file_puth = $file->move(public_path('uploads'), time().'_'.$file->getClientOriginalName());


               $handle = fopen($file_puth, 'r');
                while (($data = fgetcsv($handle, '', '|')) !== FALSE) {

                    if(isset($data[1]))
                        $data[1] =  iconv('cp866', 'UTF-8', $data[1]);
                    if(isset($data[2]))
                        $data[2] =  iconv('cp866', 'UTF-8', $data[2]);
                    if(isset($data[3]))
                        $data[3] =  iconv('cp866', 'UTF-8', $data[3]);
                    if(isset($data[4]))
                        $data[4] =  iconv('cp866', 'UTF-8', $data[4]);
                    if(isset($data[5]))
                        $data[5] =  iconv('cp866', 'UTF-8', $data[5]);

                    print_r($data);
                }


            }


        }

        return abort(404);
    }



}