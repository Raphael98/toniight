@extends("user.template")
  @section("content")
    <section class="ui grid">
    <div class="four wide computer five wide tablet sixteen wide mobile column">
      <div class="ui segment" style="margin:10px">
        <h1>{{$user->nome}}</h1>
      </div>
    </div>
    <div class="eight wide computer ten wide tablet sixteen wide mobile column" style="margin:5px">
      <h1>Postagens</h1>
      <button class="ui green button" id="btnpublish">Publicar</button>
      @include("includes.messages")
      @if(count($posts) > 0)
        @foreach($posts as $post)
          <div class="ui segment" style="margin:10px 0">
            <div class="ui buttons">
              <a href="{{route("post.delete",['id' => $post->id])}}"<button class="ui red button"><i class="ui icon remove"></i></button></a>
              <button class="ui blue button"><i class="ui icon edit"></i></button>
            </div>
            <div style="float:right"> {{$post->date != "" ?  "Data:".toBRFormat($post->date) : "Sem data"}}</div>
            <h2>{{$post->title}}</h2>
            <p>Rua {{$post->rua}}, {{$post->bairro}}, Nº {{$post->num}}</p>
            <p>{{$post->desc}}</p>
          </div>
        @endforeach
      @else
        <h2>Ops! Você ainda não publicou nada :/</h2>
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
            <input type="text" name="date" id="date" placeholder="(OPCIONAL)">
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
      $("#date").mask("99/99/9999");
      $("#btnpublish").click(function(){
        $("#publish").modal("show");
      });
    });
  </script>
@endsection
