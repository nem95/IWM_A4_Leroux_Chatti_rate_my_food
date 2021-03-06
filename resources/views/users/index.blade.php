@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <table class="table table-striped">
                    <tr class="info">
                        <td><b>Nom</b></td>
                        <td><b>Email</b></td>
                        <td><b>Type de profil</b></td>
                        <td><b>Droits</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->is_restaurant === 1 ? 'Restaurateur' : 'Client' }}
                        </td>
                        <td>
                            {!! Form::model($user,
                                array(
                                    'route' => array('change_rights', $user->id),
                                    'method' => 'PUT')
                                )
                            !!}
                            <select name="rights" onchange="this.form.submit()">
                                <option value="0" {{ $user->is_admin ? '' : 'selected' }}>Non-admin</option>
                                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                            </select>

                            {!! Form::close() !!}
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}">
                                <button class="btn btn-default">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            {!! Form::model($user,
                                array(
                                    'route' => array('users.destroy', $user->id),
                                    'method' => 'DELETE'))
                            !!}
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection