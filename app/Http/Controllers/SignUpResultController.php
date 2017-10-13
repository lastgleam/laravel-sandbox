<?php
/**
 * Created by PhpStorm.
 * User: donghee_kim
 * Date: 2017/10/13
 * Time: 14:21
 */
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Validator;

class SignUpResultController extends BaseController{
    /**
     * 登録する。失敗するとフォーム入力画面にエラーとともにリダイレクトする。
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function action(Request $request) {
        $request->flash();
        $validator = Validator::make($request->all(),[
            'surname'=>'required',
            'forename'=>'required',
            'age'=>'required|numeric|between:0,150',
            'country'=>'required',
            'gender'=>'required',
            'hobby'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('/SignUp')
                ->withErrors($validator)
                ->withInput();
        }

        return view('result', ['request' => $request]);
    }
}