<!DOCTYPE html>
<html>
<head>
  <title>Perfil: {{$user->nome}}</title>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="{{asset('/img/icon2.png')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/css/semantic.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <script src="{{asset('/js/jqueryGoogle.js')}}"></script>
    <script src="{{asset('/js/semantic.min.js')}}"></script>
    <script src="{{asset('/js/functions.js')}}"></script>
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
        <a href="{{route('user.logout')}}"><i class="browser icon"></i> Postagens</a>
        <a href="{{route('user.logout')}}"><i class="search icon"></i> Pesquisar</a>
        <a href="{{route('user.settings')}}"><i class="setting icon"></i> Configurações</a>
        <a href="{{route('user.logout')}}"><i class="sign out icon"></i> Sair</a>
      </div>
  </nav>

  <div style="width:100%;height:70px;background:white"></div>

  {{-- <div class="ui left vertical inverted menu sidebar" id="user-sidebar">
    <a class="item logo">toniight</a>
    <div class="item">
      <div class="item">
        <img src="{{asset('/img/user.png')}}" height="140px" style="border-radius:5px" alt="profile pictures">
      </div>
      <h3>{{$user->nome}}</h3>
    </div>
    <a class="item"><i class="browser icon"></i> Postagens</a>
    <a class="item"><i class="search icon"></i> Pesquisar</a>
    <a class="item"><i class="setting icon"></i> Configurações</a>
    <a class="item" href="{{route('user.logout')}}"><i class="sign out icon"></i> Sair</a>
  </div> --}}

    <section class="ui grid">
    <div class="four wide computer five wide tablet sixteen wide mobile column">
      <div class="ui segment" style="margin:10px">
        <span class="strong">{{$user->nome}}</span>
      </div>
    </div>
    <div class="eight wide computer ten wide tablet sixteen wide mobile column" style="margin:5px">
      <h1>Postagens</h1>
      <button class="ui green button" id="btnpublish">Publicar</button>
      @if(count($posts) > 0)
        @foreach($posts as $post)
          <div class="ui segment" style="margin:10px 0">
            <h1>{{$post->title}}</h1>
          </div>
        @endforeach
      @else
        <span class="strong">Ops! Foi ainda não publicou nada :/</span>
      @endif
    </div>

  </section>
  <div class="ui modal" id="publish">
    <i class="close icon"></i>
    <div class="header">Publique</div>
    <div class="ui negative message" style="display:none;margin: 5px 5px" id="error">
      <div class="header">Atenção</div>
      <div class="content">Os campos em vermelho são obrigatórios</div>
    </div>
    <div class="content">
      <form method="post" action="{{route('post.publish')}}" class="ui form" onsubmit="return validate()">
        {{csrf_field()}}
        <div class="two fields">
          <div class="field">
            <label for="title">Título</label>
            <input type="text" name="title" class="obg">
          </div>
          <div class="field">
            <label for="date">Data</label>
            <input type="text" name="date">
          </div>
        </div>
        <div class="field">
          <label>Enderenço</label>
          <div class="three fields">
            <div class="field">
              <input type="text" name="rua" placeholder="Rua" class="obg">
            </div>
            <div class="field">
              <input type="text" name="bairro" placeholder="Bairro" class="obg">
            </div>
            <div class="field">
              <input type="text" name="num" placeholder="Número" class="obg">
            </div>
          </div>
        </div>
        <div class="field">
          <label>Descrição</label>
          <textarea name="desc" rows="5" cols="10" placeholder="Descrição"></textarea>
        </div>
        <input type="submit" value="Publicar" class="ui green button">
      </form>
    </div>
  </div>

  <script>
    $(document).ready(function(){
      // $("#menu button").click(function(){
      //   $("#user-sidebar").sidebar('setting','transition','overlay').sidebar("toggle");
      // });
      $("#btnpublish").click(function(){
        $("#publish").modal("show");
      });
    });

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
