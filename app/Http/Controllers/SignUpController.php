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
use Validator;

class SignUpController extends BaseController{
    /**
     * フォームを返却する
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showForm() {
        return view('form');
    }

    /**
     * 登録する。失敗するとフォーム入力画面にエラーとともにリダイレクトする。
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function signUp(Request $request) {
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