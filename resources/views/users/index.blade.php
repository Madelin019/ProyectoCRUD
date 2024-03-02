@extends('layouts.app')
@section('title', 'Usuarios')

@section('content')

<!-- se valida que el usuarios que inicia sesión, en admin sea 1 -->
@if (auth()->user()->admin == 1)
<div class="main-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">

                <div class="row justify-content-between mb-3">
                    <div class="col-auto">
                        <h5 class="mt-2">USUARIOS</h5>
                    </div>
                    <div class="col-auto">
                        <div class="col-auto">
                            <a class="btn btn-primary btn-sm" href="{{ route('home') }}"> Regresar</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#newUser"><i class="fa fa-plus">Nuevo</i></button>
                            @include('users.modals.add') 
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table class="table data-table table-striped">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>No.</th>
                                        <th>Nombre y Apellidos</th>
                                        <th>Usuario</th>
                                        <th>Correo Electrónico</th>
                                        <th>Administrador</th>
                                        <th>Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    @include('users.modals.edit')
                                    <tr class="align-middle">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @if ($user->username == null || $user->username == 0)
                                            <span class="badge bg-danger">Google</span>
                                            @else
                                            {{ $user->username }}
                                            @endif
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->admin == 1)
                                            <span class="badge bg-danger">Administrador</span>
                                            @else
                                            <span class="badge bg-warning">Usuario</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->status == 1)
                                            <span class="badge bg-success">Activo</span>
                                            @else
                                            <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-icon btn-sm rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <button class="dropdown-item pointer btn-sm" data-bs-toggle="modal" data-bs-target="#editUser{{ $user->id }}">
                                                            <i class="fas fa-edit"></i>&nbsp; Editar
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('user-delete', ['id' => $user->id]) }}" method="POST" class="delete-user-form">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="dropdown-item pointer btn-sm">
                                                                <i class="fas fa-trash"></i>&nbsp; Eliminar
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@else
<!-- si el usuario que inicia sesión en admin es igual a 0  -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">
                    <div class="text-center">
                        <h3>Bienvenid@, lo siento pero NO eres administrador</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection