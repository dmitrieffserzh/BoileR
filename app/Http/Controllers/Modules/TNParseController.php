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

                    $data[2] =  iconv('MacCyrillic', 'UTF-8', $data[2]);

                    print_r($data);
                }


            }


        }

        return abort(404);
    }



}