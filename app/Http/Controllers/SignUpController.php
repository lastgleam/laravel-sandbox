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
        //引き継がれた値を日本語に変換
        $country_jp = ['japan'       => '日本',
            'korea'        => '韓国',
            'india'        => 'インド',
            'vietnam'      => 'ベトナム',
            'china'        => '中国',
            'usa'          => '米国'
        ];
        $gender_jp = ['male'         => '男',
            'female'          => '女'
        ];
        $hobby_jp = ['sports'        => 'スポーツ',
            'music'          => '音楽',
            'cinema'         => '映画',
            'shopping'       => '買い物',
            'manga/anime'    => '漫画/アニメ',
            'book'           => '読書',
            'prowrestling'   => 'プロレス',
            'delusion'       => '妄想',
            'game'           => 'ゲーム'
        ];
        $result = $request->all();
        //国籍を変換
        $result['country'] = $country_jp[$result['country']];
        //性別を変換
        if($result['gender'] === 'male'){
            $result['gender'] = $gender_jp['male'];
        }else{
            $result['gender'] = $gender_jp['female'];
        }
        //趣味を変換
        $hobby_new = [];
        foreach ($result['hobby'] as $hobby_en){
            if(in_array($hobby_en, $result['hobby'])){
                $hobby_new[] = $hobby_jp[$hobby_en];
            }
        }
        $result['hobby'] = $hobby_new;

        return view('result', ['result' => $result]);
    }
}