<!doctype html>
@php
   //引き継がれた値を日本語に変換
        $country_jp = config('translate.country_jp');
        $gender_jp = config('translate.gender_jp');
        $hobby_jp = config('translate.hobby_jp');

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
@endphp
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Result</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet" />
        <style>
            body {
                font-family: "Noto Sans Japanese";
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>ウエルカム！<br/><small>下記のように登録いたしました。</small></h1>
            </div>
            <div class="col-lg-6">
                <table class="table table-hover">
                    <tbody style="font-size: large">
                    <tr>
                        <td>姓名</td><td>{{$result['surname'].' '.$result['forename']}}</td>
                    </tr>
                    <tr>
                        <td>Eメール</td><td>{{$result['email']}}</td>
                    </tr>
                    <tr>
                        <td>年齢</td><td>{{$result['age']}}才</td>
                    </tr>
                    <tr>
                        <td>生年月日</td><td>{{$result['year'].'年 '.$result['month'].'月 '.$result['day'].'日'}}</td>
                    </tr>
                    <tr>
                        <td>国籍</td><td>{{$result['country']}}</td>
                    </tr>
                    <tr>
                        <td>性別</td><td>{{$result['gender']}}</td>
                    </tr>
                    <tr>
                        <td>趣味</td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach($result['hobby'] as $hobby)
                                    <li>{{$hobby}}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
