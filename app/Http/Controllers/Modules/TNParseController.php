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

        if($request->ajax() && $request->method() == 'POST')
            return json_decode('done');
        return abort(404);
    }



}