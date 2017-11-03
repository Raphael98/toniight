@extends('user.template')
  @section("content")
    <div class="ui one column centered grid">
      <div class="six wide computer fourteen wide mobile column">
        <div class="ui segment" style="margin:10px 0">
          <h1>Configurações</h1>
          @include("includes.messages")
          <form class="ui form" action="{{route('user.update',['field' => 'nome'])}}" method="POST">
            {{ csrf_field() }}
            <div class="field">
              <label>Nome</label>
              <div class="ui action input">
                <input type="text" name="nome">
                <button type="submit" class="ui green button">Alterar</button>
              </div>
            </div>
          </form>
          <form class="ui form" action="{{route('user.update', ['field' => 'email'])}}" method="POST">
            {{csrf_field()}}
            <div class="field">
              <label>Email</label>
              <div class="ui action input">
                <input type="text" name="email">
                <button type="submit" class="ui green button">Alterar</button>
              </div>
            </div>
          </form>
          <form class="ui form" action="{{route('user.update', ['field' => 'password'])}}" method="POST">
            {{csrf_field()}}
            <div class="field">
              <label>Senha atual</label>
              <input type="password" name="old">
            </div>
            <div class="field">
              <label>Nova senha</label>
              <input type="password" name="password">
            </div>
            <input type="submit" class="ui green button" value="Alterar">
          </form>
        </div>
      </div>
    </grid>
  @endsection
