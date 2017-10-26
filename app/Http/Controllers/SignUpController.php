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
    public function input() {
        return view('form');
    }

    /**
     * 登録する。失敗するとフォーム入力画面にエラーとともにリダイレクトする。
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result(Request $request) {
        $request->flash();
        $validator = Validator::make($request->all(),[
            'surname'=>'required',
            'forename'=>'required',
            'email'=>'required|email',
            'age'=>'required|numeric|between:0,150',
            'year' => 'required|numeric',
            'month' => 'required|numeric',
            'day' => 'required|numeric',
            'country'=>'required',
            'gender'=>'required',
            'hobby'=>'required'
        ]);
        //バリデーションに失敗した場合
        if ($validator->fails()) {
            return redirect('/SignUp')
                ->withErrors($validator)
                ->withInput();
        }
        $result = $request->all();
        return view('result', ['result' => $result]);
    }

}