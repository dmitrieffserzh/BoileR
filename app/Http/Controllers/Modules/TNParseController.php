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
use Illuminate\Support\Facades\Storage;

class TNParseController extends Controller {


    public function index(){
        return view('modules.TNParse.index');
    }


    public function upload(Request $request) {

        if($request->ajax() && $request->method() == 'POST') {

            foreach ($request->file() as $files) {
                foreach ($files as $file) {
                    $file->move(storage_path('images'), time().'_'.$file->getClientOriginalName());
                }
            }

            return "Успех";
        }

        return abort(404);
    }



}