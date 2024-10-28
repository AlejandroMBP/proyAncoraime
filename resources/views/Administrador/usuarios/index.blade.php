@extends('Administrador.app')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Usuarios
                <small>Administracion</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../../index.html"><i class="fa fa-home"></i> Administrador</a></li>
                <li><a href="#">Usuarios</a></li>
                <li class="active">listar</li>
            </ol>
        </section>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                <div class="card panel panel-default">
                    <div class="card-header">
                        <div class="heading-title">
                            <button class="rounded-flexible-btn" id="openModalUsuarioButton">Crear Nuevo Usuario</button>
                        </div>
                    </div>

                    <div class="p-4">
                        <table id="UsuarioTables" class="table table-striped table-bordered dt-responsive nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>nombre</th>
                                    <th>nombre de usuario</th>
                                    <th>email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $contador = 1;
                                @endphp
                                @foreach ($user as $users)
                                    @if ($users->estado == 1)
                                        <tr>
                                            <td>{{ $contador }}</td>
                                            <td>{{ $users->name }}</td>
                                            <td>{{ $users->username }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <form action="" method="POST" class="formbtn">
                                                        @csrf
                                                        <button type="submit" class="rounded-flexible-btn delete-btn"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>

                                                    <form action="{{ route('usuario.update', $users->id) }}" method="POST"
                                                        class="formbtn">
                                                        @csrf
                                                        @method('PUT')
                                                        <!-- Método para indicar que se está haciendo una actualización -->
                                                        <button type="button"
                                                            class="rounded-flexible-btn editUsuariobutton"
                                                            data-id="{{ $users->id }}" data-name="{{ $users->name }}"
                                                            data-username="{{ $users->username }}"
                                                            data-email="{{ $users->email }}"
                                                            onclick="populateEditModal(this)">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </form>
                                                    <button type="button" class="rounded-flexible-btn preview-button">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $contador++;
                                        @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Administrador.usuarios.create')
    @include('Administrador.usuarios.edit')
@endsection
@push('links')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
    <script>
        new DataTable('#UsuarioTables', {
            language: {
                info: '',
                infoEmpty: 'No se encontro registro',
                infoFiltered: '',
                lengthMenu: 'Paginas  _MENU_',
                zeroRecords: 'No se encontro registro',
                search: 'Buscar',
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#openModalUsuarioButton').on('click', function() {
                $('#crearUsuarioModal').modal('show');
            });

            $('#usuarioForm').submit(function(event) {
                event.preventDefault(); // Evitar el envío normal del formulario
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/personal/create', // Cambia esto por tu ruta
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Usuario creado exitosamente",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                        // Opcional: recargar la tabla o limpiar el formulario
                        $('#usuarioForm')[0].reset(); // Reiniciar el formulario
                        $('.error-message').empty(); // Limpiar los mensajes de error
                        $('#crearUsuarioModal').modal('hide'); // Cerrar el modal

                    },
                    error: function(xhr) {
                        // Limpiar mensajes de error previos
                        $('.error-message').empty(); // Limpiar mensajes de error existentes

                        // Mostrar errores debajo de los campos
                        if (xhr.responseJSON.errors) {
                            for (const [key, value] of Object.entries(xhr.responseJSON
                                    .errors)) {
                                const errorMessage = value[
                                    0]; // Tomar el primer mensaje de error
                                const inputField = $(
                                    `[name="${key}"]`
                                ); // Seleccionar el campo de entrada correspondiente

                                // Agregar el mensaje de error en el contenedor debajo del campo
                                inputField.siblings('.error-message').text(errorMessage);
                            }
                        }
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Abrir modal y cargar datos del usuario
            $('.editUsuariobutton').on('click', function() {
                const userId = $(this).data('id');
                console.log(userId);

                // Hacer una solicitud AJAX para obtener los datos del usuario
                $.ajax({
                    url: '/personal/edit/' + userId, // Cambia esto a tu ruta
                    method: 'GET',
                    success: function(data) {
                        console.log('dentro');

                        // Rellena el modal con los datos del usuario
                        $('#userId').val(data.usuario.id);
                        $('#editNombre').val(data.usuario.name);
                        $('#editUsername').val(data.usuario.username);
                        $('#editEmail').val(data.usuario.email);
                        $('#rol').val(data.rol); // Asignar el rol al select
                        $('#editUserModal').modal('show');
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // $('#saveChangesBtn').on('click', function(e) {
            //     e.preventDefault(); // Evita el comportamiento por defecto del botón

            //     var userId = $('#userId').val(); // Obtén el ID del usuario
            //     var formData = $('#editUserForm').serialize(); // Serializa los datos del formulario

            //     $.ajax({
            //         url: '/personal/update/' + userId, // Cambia esto a tu ruta
            //         method: 'PUT',
            //         data: formData,
            //         success: function(data) {
            //             console.log(data.message);
            //             // Cerrar el modal o realizar otras acciones aquí
            //             $('#editUserModal').modal('hide');
            //             // Recargar la tabla de usuarios o mostrar una notificación de éxito
            //         },
            //         error: function(xhr) {
            //             if (xhr.status === 422) {
            //                 // Manejo de errores de validación
            //                 var errors = xhr.responseJSON.errors;
            //                 // Limpiar mensajes de error previos
            //                 $('.error-message').text('');
            //                 $.each(errors, function(key, value) {
            //                     // Mostrar errores debajo de cada campo
            //                     $('[name="' + key + '"]').next('.error-message').text(
            //                         value[0]);
            //                 });
            //             } else {
            //                 console.error(xhr.responseText);
            //             }
            //         }
            //     });
            // });

        });
    </script>
    <script>
        function populateEditModal(button) {
            // Obtener datos del botón
            var userId = button.dataset.id;
            var userName = button.dataset.name;
            var userUsername = button.dataset.username;
            var userEmail = button.dataset.email;
            var userRol = button.dataset.rol; // Agregar rol si es necesario

            // Llenar el formulario del modal
            document.getElementById('editUserId').value = userId;
            document.getElementById('editUserName').value = userName;
            document.getElementById('editUsername').value = userUsername;
            document.getElementById('editUserEmail').value = userEmail;
            document.getElementById('rol').value = userRol; // Llenar rol

            // Establecer la acción del formulario para enviar al controlador
            document.getElementById('editUserForm').action = "{{ url('/personal/update') }}/" +
                userId; // Cambia por la ruta correcta

            // Abrir el modal
            $('#editUserModal').modal('show');
        }
    </script>
@endpush
<style>
    /* estilo de  texto abrebiado */
    .texto-abreviado {
        display: inline-block;
        /* Permite que el elemento se ajuste al contenido */
        max-width: 150px;
        /* Ajusta el ancho máximo según sea necesario */
        overflow: hidden;
        /* Oculta el texto que desborda */
        white-space: nowrap;
        /* Evita que el texto se divida en varias líneas */
        text-overflow: ellipsis;
        /* Muestra '...' para indicar que hay más texto */
    }

    .rounded-flexible-btn {
        background: linear-gradient(to right, #007bff, #20c997);
        color: white;
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 50px;
        min-height: 40px;
        font-size: 16px;
        text-align: center;
        transition: all 0.3s ease-in-out;
        margin: 0 5px;
        /* Espaciado horizontal entre botones */
    }

    .rounded-flexible-btn:hover {
        box-shadow: 0 0 10px 2px rgba(32, 201, 151, 0.7);
        transform: scale(1.05);
    }

    tr th {
        text-align: center;
        border-radius: 8px;
    }

    tr td {
        text-align: center;
        border-radius: 8px;
    }

    .nav-tabs .nav-link {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 10px 20px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .nav-tabs .nav-link.active {
        color: white;
        border-radius: 10px;
    }

    .nav-tabs .nav-link:hover {
        background-color: rgba(0, 123, 255, 0.1);
    }

    .btn-group {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-group .rounded-flexible-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        /* Asegura que el contenido esté centrado */
        min-width: 50px;
        /* Ancho mínimo para todos los botones */
        min-height: 40px;
        /* Altura mínima para todos los botones */
        margin: 0 5px;
        /* Espaciado horizontal entre botones */
    }

    /* Asegúrate de que el botón de eliminar sea del mismo tamaño */
    .delete-btn {
        min-height: 40px;
        /* Igualar la altura mínima */
        min-width: 50px;
        /* Igualar el ancho mínimo */
    }

    .formbtn {
        display: flex;
        /* Asegura que el formulario también esté en línea */
        align-items: center;
        margin: 0;
        /* Elimina márgenes que puedan desalinear los botones */
    }
</style>
