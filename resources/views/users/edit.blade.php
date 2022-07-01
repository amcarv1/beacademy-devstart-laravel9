@extends('template.users')
@section('title', 'Editando Usuário');
@section('body')
<h1>Usuário {{$user->name}}</h1>

@if($errors->any())
  <div class="alert alert-danger" role="alert">
      @foreach($errors->all() as $error)
          {{ $error }}<br>
      @endforeach
  </div>
@endif

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">E-mail</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}">
      </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
@endsection