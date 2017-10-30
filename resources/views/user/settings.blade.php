@extends('user.template')
  @section("content")
    <div class="ui one column centered grid">
      <div class="six wide computer fourteen wide mobile column">
        <div class="ui segment" style="margin:10px 0">
          <h1>Configurações</h1>
          <form class="ui form" action="{{route('user.update')}}" method="POST">
            <div class="field">
              <label>Nome</label>
              <input type="text" name="nome">
            </div>
            <input type="submit" class="ui green button" value="Alterar nome">
          </form>
          <form class="ui form" action="{{route('user.update')}}" method="POST">
            <div class="field">
              <label>Email</label>
              <input type="text" name="nome">
            </div>
            <input type="submit" class="ui green button" value="Alterar nome">
          </form>
          <form class="ui form" action="{{route('user.update')}}" method="POST">
            <div class="field">
              <label>Senha atual</label>
              <input type="text" name="nome">
            </div>
            <div class="field">
              <label>Nova senha</label>
              <input type="text" name="nome">
            </div>
            <input type="submit" class="ui green button" value="Alterar nome">
          </form>
        </div>
      </div>
    </grid>
  @endsection
