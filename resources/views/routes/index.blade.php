@php
    use App\Enums\EEncapsulamientoRutas;
@endphp
@extends('layouts.master_container')

@section('contents')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE RUTA</th>
                <th>RUTA COMPLETA</th>
                <th>VERBO HTTP</th>
                <th>ENCAPSULAMIENTO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rutas as $r)
                <tr>
                    <th>{{$r->id}}</th>
                    <th>{{$r->ruta_nombre}}</th>
                    <th>{{$r->ruta_completa}}</th>
                    <th>{{$r->verbo_http}}</th>
                    <th>
                        @switch($r->encapsulamiento)
                            @case(EEncapsulamientoRutas::getIndex(EEncapsulamientoRutas::PUBLICA)->getId())
                                <div class="custom-control custom-switch">
                                    <label>
                                        PUBLICA
                                    <input type="checkbox" name="sw_toggle" class="custom-control-input" id="rutaToggle{{$r->id}}" onclick="changeState(this)" id_ruta="{{$r->id}}" value="{{EEncapsulamientoRutas::getIndex(EEncapsulamientoRutas::PUBLICA)->getId()}}">
                                      <span class="custom-control-label"></span> PROTEGIDA
                                    </label>
                                </div>
                                @break
                            @case(EEncapsulamientoRutas::getIndex(EEncapsulamientoRutas::PROTEGIDA)->getId())
                            <div class="custom-control custom-switch">
                                <label>
                                    PUBLICA
                                <input type="checkbox" name="sw_toggle" class="custom-control-input" id="rutaToggle{{$r->id}}" onclick="changeState(this)" id_ruta="{{$r->id}}" value="{{EEncapsulamientoRutas::getIndex(EEncapsulamientoRutas::PRIVADA)->getId()}}" checked>
                                  <span class="custom-control-label"></span> PROTEGIDA
                                </label>
                            </div>
                                @break
                            @case(EEncapsulamientoRutas::getIndex(EEncapsulamientoRutas::PRIVADA)->getId())
                                <div class="custom-control custom-switch">
                                    <label>
                                    <input type="checkbox" id="rutaToggle{{$r->id}}" disabled>
                                    <span class="lever"></span> PRIVADA
                                    </label>
                                </div>
                                @break
                        @endswitch
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$rutas->links()}}
@endsection

@section('scripts')
    <script type="application/javascript">
    const RUTA_PUBLICA = "{{EEncapsulamientoRutas::getIndex(EEncapsulamientoRutas::PUBLICA)->getId()}}"
    const RUTA_PROTEGIDA = "{{EEncapsulamientoRutas::getIndex(EEncapsulamientoRutas::PROTEGIDA)->getId()}}";
        function changeState(e){
            if(e.value == RUTA_PUBLICA){
                e.value = RUTA_PROTEGIDA;
            }else{
                e.value = RUTA_PUBLICA;
            }
            $.ajax({
                url: "{{route('rutas.cambiar_encapsulamiento_ruta')}}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: e.getAttribute('id_ruta'),
                    encapsulamiento: e.value,
                },
                success: function(r){
                    console.log(r);
                }
            });
        }
    </script>
@endsection
