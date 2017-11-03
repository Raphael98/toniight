@extends('default')
  @section("content")
    <div style="width:100%;height:80px"></div>
    <section class="ui one column centered grid">
      <div class="six wide computer fifteen wide mobile column" style="min-height:500px">
        <h1>Pesquisa</h1>
        @include('includes.messages')
        <form class="ui form" method="POST" action="{{route('search.key')}}">
          {{csrf_field()}}
          <div class="ui action input field" style="width:80%">
            <input type="text" name="keyword" placeholder="Pesquise por título">
            <button type="submit" class="ui blue button"><i class="ui icon search"></i></button>
          </div>
        </form>
        @foreach($posts as $post)
          <div class="ui segment post" style="margin:10px 0">
            <div style="float:right"> {{$post->date != "" ?  "Data: ".toBRFormat($post->date) : "Sem data"}}</div>
            <b>Postado por:</b> {{$post->user->nome}}
            <h2>{{$post->title}}</h2>
            <p>Rua {{$post->rua}}, {{$post->bairro}}, Nº {{$post->num}}</p>
            <p>{{$post->desc}}</p>
          </div>
        @endforeach
      </div>
    </section>
  @endsection
