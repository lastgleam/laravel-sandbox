<?php
/**
 * Created by PhpStorm.
 * User: donghee_kim
 * Date: 2017/10/10
 * Time: 16:19
 */
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Validator;

class SignUpFormController extends BaseController{
    /**
     * フォームを返却する
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function input() {
        return view('form');
    }
}