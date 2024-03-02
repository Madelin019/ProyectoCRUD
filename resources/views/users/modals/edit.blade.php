<div class="modal fade" id="editUser{{ $user->id }}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content position-relative">
            <div class="modal-body p-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Editar Usuario: {{ $user->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="p-4 pb-0">
                    <form action="{{ route('user-edit-post', $user->id) }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row mb-2 justify-content-center">
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="name">Nombres y Apellidos</label>
                                    <input class="form-control" type="text" name="name" placeholder="Escriba los nombres y apellidos" required value="{{ $user->name }}" />
                                </div>
                            </div>
                            @if ($user->username !== NULL)
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="username">Usuario</label>
                                    <input class="form-control" type="text" name="username" placeholder="Escriba el nombre del usuario" required value="{{ $user->username }}" />
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="email">Correo Electrónico</label>
                                    <input class="form-control" type="email" name="email" placeholder="Escriba el correo electrónico del usuario" required value="{{ $user->email }}" />
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="status">Estado</label>
                                    <select name="status" id="status" class="form-select selectpicker" required>
                                        <option value="">Seleccione</option>
                                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Activo</option>
                                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="admin">¿Es administrador?</label>
                                    <select name="admin" id="admin" class="form-select selectpicker" required>
                                        <option value="">Seleccione</option>
                                        <option value="1" {{ $user->admin == 1 ? 'selected' : '' }}>Si</option>
                                        <option value="0" {{ $user->admin == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>