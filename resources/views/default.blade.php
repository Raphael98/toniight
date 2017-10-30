<!DOCTYPE html>
<html>
<head>
    <title>toniight</title>
    <meta charshet="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="{{asset('/img/icon2.png')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/css/semantic.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <script src="{{asset('/js/jqueryGoogle.js')}}"></script>
    <script src="{{asset('/js/semantic.min.js')}}"></script>
    <script src="{{asset('/js/functions.js')}}"></script>
</head>
<body>

  <div id="sidebar">
  </div>
  <nav id="menu">
      <a href="{{url('/')}}"><span id="logo">toniight</span></a>
      <button>&#9776;</button>
      <div id="itens">
        <a href="#sobre">Sobre</a>
        <a href="#">Pesquise</a>
      @if(Auth::check())
        <a href="{{route('user.logout')}}">Logout</a>
        <a href="{{route('user.profile')}}">Minha conta</a>
      @else
        <a href="{{url('signup')}}">Cadastra-se</a>
        <a href="{{route('login')}}">Login</a>
      @endif
      </div>
  </nav>
  @yield("content");

  <footer class="ui grid" style="padding: 0 10px; text-align:center">
        <div class="sixteen wide column">
            toniight &#169; 2017<br>
            <div id="face" class="circle"><i class="fa fa-facebook" aria-hidden="true"></i></div>
            <div id="twitter" class="circle"><i class="fa fa-twitter" aria-hidden="true"></i></div>
        </div>
        <div class="sixteen wide column">
            Todas as imagens foram retiradas de <a href="https://www.unsplash.com" target="_blank" rel="noopener">UNSPLASH</a><br>
            Créditos aos fotógrafos:
            <ul style="list-style:none">
                <li><a href="https://unsplash.com/@anthonydelanoix" target="_blank" rel="noopener">Anthony Delanoix</a></li>
                <li><a href="https://unsplash.com/@benshares" target="_blank" rel="noopener">Ben Duchac</a></li>
                <li><a href="https://unsplash.com/@hellblazer" target="_blank" rel="noopener">John Raptis</a></li>
                <li><a href="https://unsplash.com/@seb" target="_blank" rel="noopener">Sebastien Jermer</a></li>
                <li><a href="https://unsplash.com/@yutacar" target="_blank" rel="noopener">Yutacar</a></li>
            </ul>
        </div>
    </footer>
    <!-- Login Modal -->
    <div class="ui modal" id="login">
    <i class="close icon"></i>
        <div class="header">Login</div>
        <div class="content">
            <form class="ui form" method="POST" action="user/login">
                <div class="field">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" placeholder="example@domain.com">
                </div>
                <div class="field">
                    <label for="password">Senha</label>
                    <input type="password" name="password">
                </div>
                <input type="submit" class="ui green button" value="Entrar">
            </form>
        </div>
    </div>
</body>
</html>
