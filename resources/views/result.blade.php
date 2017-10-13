<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Result</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            tbody {
                font-size: large;
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
                    <tbody>
                    <tr>
                        <td>姓名</td><td>{{$result['surname']}} {{$result['forename']}}</td>
                    </tr>
                    <tr>
                        <td>年齢</td><td>{{$result['age']}}</td>
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
