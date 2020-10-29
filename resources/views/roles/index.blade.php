@extends('layouts.master_container')


@section('style')

@endsection

@section('content')
    <div class="mt-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearRolModal">
            {{__('roles.crear_rol_btn')}}
        </button>
    </div>
    <table class="table mt-2">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>ACCIONES</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($roles as $rol)
                    <tr>
                        <td scope="row">{{$rol['id']}}</td>
                        <td>{{$rol['nombre']}}</td>
                        <td>
                            @if (blank($rol['descripcion']) || $rol['descripcion'] == '')
                                {{__('roles.no_disponible')}}
                            @else
                                {{$rol['descripcion']}}
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary">{{__('roles.detalles')}}</a>
                            <a href="#" class="btn btn-warning">{{__('roles.permisos')}}</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
    </table>



    <div class="modal fade" tabindex="-1" id="crearRolModal" aria-hidden="true" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('roles.crear_rol_modal_titulo') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <x-form actionLink="jodidoxd" sendMethod="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre_rol">{{__('roles.nombre_form')}}</label>
                            <input type="text" name="nombre" id="nombre_rol" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombre_rol">{{__('roles.nombre_form')}}</label>
                            <textarea name="descripcion" id="descripcion_rol" class="summernote form-control"><textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('roles.cerrar_modal_btn') }}</button>
                        <button type="submit" class="btn btn-primary">{{__('roles.crear_modal_btn')}}</button>
                    </div>
                </x-form>
          </div>
        </div>
      </div>
@endsection

@section('script')
      <script>

        $('summernote').summernote();

      </script>
@endsection
