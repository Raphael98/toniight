@extends("default")
    @section("content")
    <div style="width:100%;height:80px"></div>
    <div class="ui one column centered grid" style="margin:10% 0">
    <div class="four wide computer ten wide mobile column">
      <h1 style="color:lightcoral">Cadastre-se</h1>

      <div class="ui negative message" id="error" style="display:none">
          <div class="header">Atenção!</div>
          Os campos em vermelhor são obrigatórios
      </div>
      @include("includes.messages")
      <form method="post" action="{{route('user.signup')}}" class="ui form" id="signup" onsubmit="return validate()">
        {{csrf_field()}}
        <div class="field">
          <label for="nome">Nome*</label>
          <input type="text" name="nome">
        </div>
        <div class="field">
          <label for="email">Email*</label>
          <input type="text" name="email">
        </div>
        <div class="field">
          <label for="password">Senha*</label>
          <input type="password" name="password">
        </div>
        <input type="submit" class="ui green button" value="Criar conta" id="btn">
      </form>
      </div>
    </div>

    <script>
        function validate(){
            var bool = true;
            $("#signup input").each(function(){
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
    @endsection
