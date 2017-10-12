<?php
/**
 * Created by PhpStorm.
 * User: donghee_kim
 * Date: 2017/10/10
 * Time: 16:19
 */
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class LoginController extends BaseController{
    public function form() {
        return view('login');
    }
    public function post(Request $request) {
        $validate_rule = array(
          'sei'=>'required',
          'mei'=>'required',
          'age'=>'required|numeric|between:0,150',
          'country'=>'required',
          'gender'=>'required',
          'hobby'=>'required'
        );
        $request->validate($validate_rule);
        return view('login',['request' => $request]);
    }
}