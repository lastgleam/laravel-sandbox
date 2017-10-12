<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<style>
    tbody {
        font-size: large;
    }
</style>
<body>
    @if ($errors->any())
        <div class="container">
            <br/>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
   @isset($request)
   <div class="container">
       <div class="page-header">
           <h1>ウエルカム！<br/><small>下記のように登録いたしました。</small></h1>
       </div>
       <div class="col-lg-6">
           <table class="table table-hover">
               <tbody>
               <tr>
                   <td>姓名</td><td>{{$request->sei}} {{$request->mei}}</td>
               </tr>
               <tr>
                   <td>年齢</td><td>{{$request->age}}</td>
               </tr>
               <tr>
                   <td>国籍</td><td>{{$request->country}}</td>
               </tr>
               <tr>
                   <td>性別</td><td>{{$request->gender}}</td>
               </tr>
               <tr>
                   <td>趣味</td>
                   <td>
                       <ul class="list-unstyled">
                       @foreach(($request->hobby) as $hobby)
                           <li>{{$hobby}}</li>
                       @endforeach
                       </ul>
                   </td>
               </tr>
               </tbody>
           </table>
       </div>
   </div>
   @else
   <div class="container">
       <div class="page-header">
           <h1>フォーム<br/><small>下のフォームを完成してから提出ボタンを押すと登録されます。</small></h1>
       </div>
       <div class="col-lg-6">
           <form class="form-horizontal" method="post" action="/login">
               {{csrf_field()}}
               <div class="form-group">
                   <label class="col-sm-2 control-label">性</label>
                   <div class="col-sm-10">
                       <input type="name" class="form-control" name="sei" placeholder="e.g. 新垣">
                   </div>
               </div>
               <div class="form-group">
                   <label class="col-sm-2 control-label">名</label>
                   <div class="col-sm-10">
                       <input type="name" class="form-control" name="mei" placeholder="e.g. 結衣">
                   </div>
               </div>
               <div class="form-group">
                   <label class="col-sm-2 control-label">年齢</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" name="age">
                   </div>
               </div>
               <div class="form-group">
                   <label class="col-sm-2 control-label">国籍</label>
                   <div class="col-sm-10">
                       <select class="form-control" name="country">
                           <option value="japan">日本</option>
                           <option value="korea">韓国</option>
                           <option value="india">インド</option>
                           <option value="china">中国</option>
                           <option value="vietnam">ベトナム</option>
                           <option value="usa">米国</option>
                       </select>
                   </div>
               </div>
               <div class="form-group">
                   <label class="col-sm-2 control-label">性別</label>
                   <div class="col-sm-10">
                       <label class="radio-inline">
                           <input type="radio" name="gender" value="male">男</label>
                       <label class="radio-inline">
                           <input type="radio" name="gender" value="female">女</label>
                   </div>
               </div>
               <div class="form-group">
                   <label class="col-sm-2 control-label">趣味</label>
                   <div class="col-sm-10">
                       <label class="checkbox-inline">
                           <input type="checkbox" name="hobby[]" value="sports"> スポーツ
                       </label>
                       <label class="checkbox-inline">
                           <input type="checkbox" name="hobby[]" value="music"> 音楽
                       </label>
                       <label class="checkbox-inline">
                           <input type="checkbox" name="hobby[]" value="cinema"> 映画
                       </label>
                       <label class="checkbox-inline">
                           <input type="checkbox" name="hobby[]" value="shopping"> 買い物
                       </label>
                       <label class="checkbox-inline">
                           <input type="checkbox" name="hobby[]" value="manga/anime"> マンガ・アニメ
                       </label>
                       <label class="checkbox-inline">
                           <input type="checkbox" name="hobby[]" value="reading"> 読書
                       </label>
                       <label class="checkbox-inline">
                           <input type="checkbox" name="hobby[]" value="prowrestling"> プロレス
                       </label>
                       <label class="checkbox-inline">
                           <input type="checkbox" name="hobby[]" value="delusion"> 妄想
                       </label>
                       <label class="checkbox-inline">
                           <input type="checkbox" name="hobby[]" value="game"> ゲーム
                       </label>
                   </div>
               </div>
               <div class="form-group">
                   <div class="col-sm-offset-2 col-sm-10">
                       <button type="submit" class="btn btn-success">提出</button>
                   </div>
               </div>
           </form>
       </div>
    </div>
   @endisset
</body>
</html>
