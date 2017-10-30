<!DOCTYPE html>
<html>
<head>
  <title>{{$user->nome}}</title>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="{{asset('/img/icon2.png')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/css/semantic.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <script src="{{asset('/js/jqueryGoogle.js')}}"></script>
    <script src="{{asset('/js/semantic.min.js')}}"></script>
    <script src="{{asset('/js/functions.js')}}"></script>
    <script src="{{asset('/js/maskedinput.js')}}"></script>
    <style>
      body{
        background-color: #fff7f7;
      }

    </style>
</head>
<body>

  <div id="sidebar">
    <div class="item">
      <img src="{{asset('/img/user.png')}}" alt="profile picture" height="140px">
      <h3>{{$user->nome}}</h3>
    </div>
  </div>

  <nav id="menu" style="border-bottom:1px solid lightgray;">
      <a href="{{url('/')}}"><span id="logo">toniight</span></a>
      <button>&#9776;</button>
      <div id="itens">
        <a href="{{route('user.profile')}}"><i class="browser icon"></i> Postagens</a>
        <a href="{{route('search')}}"><i class="search icon"></i> Pesquisar</a>
        <a href="{{route('user.settings')}}"><i class="setting icon"></i> Configurações</a>
        <a href="{{route('user.logout')}}"><i class="sign out icon"></i> Sair</a>
      </div>
  </nav>

  <div style="width:100%;height:70px;background:white"></div>

    @yield("content")

  <script>
    function validate(){
      var bool = true;
        $(".obg").each(function(){
            if($(this).val() == ""){
                $(this).css("box-shadow","0 0 8px red");
                $("#error").show();
                bool = false;
            }else{
                $(this).css("box-shadow","none");
            }
        });
        return bool;
      }
    </script>
</body>
</html>
