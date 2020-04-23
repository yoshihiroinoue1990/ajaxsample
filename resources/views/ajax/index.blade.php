<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>AjaxSample</title>

        <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- JQueryの読み込み開始 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">

        $(function(){
            $('#select_area').on('change',function(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/ajax/selected_area',
                    type:'POST',
                    data:{
                        area: $(this).val()
                    }
                })
                // Ajaxリクエストが成功した時発動
                .done(function (results) {
                    $("#selected_prefecture option:not(:first-child)").remove(); //optionリセット
                    $("#selected_prefecture").append(results);
                })
                // Ajaxリクエストが失敗した時発動
                .fail( (data) => {
                    alert("error"); //通信失敗時
                })
            });
        });
        </script>
    
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/ajax/index') }}" style="color:black;">
                        {{ config('app.name', 'AjaxSample') }}
                    </a>
            </nav>

            
            <form id="select_area_prefecter" method="post"  action="{{ action('AjaxController@create') }}">
                {{ csrf_field() }}
                <main class="py-4" style="padding-right:20%; padding-left:20%;">
                    <div style="padding-bottom:20px;">
                        <p>エリア選択</p>
                        <select name="area" id="select_area" class="form-control">
                           <option value="1">北海道</option>
                           <option value="2">関西</option>
                           <option value="3">九州</option>
                        </select>
                    </div>
                    <div>
                        <p>都道府県選択</p>
                        <select name="prefecture" id="selected_prefecture" class="form-control">
                           <option value="">--選択してください--</option>
                        </select>
                    </div>
                    <div style="padding:20px; text-alain:center">
                        <input type="submit" class="btn btn-primary" value="登録">
                    </div>
                </main>
            </form>
        </div>
    
    </body>
</html>