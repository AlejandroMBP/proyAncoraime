<div class="modal fade" id="crearUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="crearUsuarioModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearUsuarioModalLabel">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="usuarioForm" class="was-validated">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre completo"
                            required>
                        <div class="error-message text-danger"></div> <!-- Contenedor para errores -->
                    </div>
                    <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input type="text" name="username" class="form-control"
                            placeholder="Ingrese nombre de usuario">
                        <div class="error-message text-danger"></div> <!-- Contenedor para errores -->
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" name="email" class="form-control"
                            placeholder="Ingrese correo electroico" required>
                        <div class="error-message text-danger"></div> <!-- Contenedor para errores -->
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Ingresar contraseña"
                            required>
                        <div class="error-message text-danger"></div> <!-- Contenedor para errores -->
                    </div>
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <select name="rol" class="form-control" required>
                            <option value="">Seleccione un rol</option>
                            @foreach ($role as $rol)
                                @if (Auth::user()->hasRole('Administrador') || $rol->name !== 'Administrador')
                                    <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="error-message text-danger"></div> <!-- Contenedor para errores -->
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                </form>
            </div>
        </div>
    </div>
</div>
