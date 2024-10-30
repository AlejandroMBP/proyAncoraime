<!-- Modal para editar usuario -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" action="{{ route('usuario.update', $users->id) }}" method="POST">

                    @csrf
                    @method('PUT') <!-- Usar método PUT para la actualización -->
                    <input type="hidden" id="editUserId" name="id" value="{{ $users->id }}">
                    @dump($users->id)
                    <div class="form-group">
                        <label for="editUserName">Nombre</label>
                        <input type="text" class="form-control" id="editUserName" name="name" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="editUsername">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="editUsername" name="username" required>
                        @error('username')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="editUserEmail">Email</label>
                        <input type="email" class="form-control" id="editUserEmail" name="email" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <select name="rol" id="rol" class="form-control" required>
                            <option value="">Seleccione un rol</option>
                            @foreach ($role as $rol)
                                @if (Auth::user()->hasRole('Administrador') || $rol->name !== 'Administrador')
                                    <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('rol')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                </form>
            </div>
        </div>
    </div>
</div>
