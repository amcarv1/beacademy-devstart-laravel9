@extends('template.users')
@section('title', 'Listagem de Usuário')
@section('body')
        <h2>Usuário {{ $user->name }}</h2>
        <table class="table">
            <thead class="text-center">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Data Cadastro</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>

              </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ date('d/m/Y - H:i', strtotime($user->created_at)) }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning text-white">Editar</a>
                    </td>
                    <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button  type="submit" class="btn btn-danger text-white">Deletar</button>
                        </form>
                    </td>
                </tr>
            </tbody>
          </table>
@endsection