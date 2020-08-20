@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">*{{ $error }}</p>
    @endforeach
@endif

<form method="post" action="{{ $action }}" class="col-md-12 col12">
    <div class="row">
        {{ csrf_field() }}  {{-- sin está funciona no podemos guardar información ya que se encarga de la seguridad  --}}
        <div class="col-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Título:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required="required" value="{{ $tarea->titulo }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Prioridad:</label>
                            <select id="prioridad_id" name="prioridad_id" class="form-control">
                                <option value="0">Selecciona</option>
                                @if(!empty($prioridades))
                                    @foreach ($prioridades as $p)
                                        <option value="{{$p->id}}" {{$p->id === $tarea->prioridad_id ? 'selected' : ''}}>{{$p->prioridad}} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <span class="text-danger">*&nbsp;</span><label>Descripción</label>
                                <textarea id="description" name="description" class="form-control">{{ $tarea->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-3">
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                    </div>
                    @if (!empty($put)) {{-- cambio el método del formulario para llevar a cabo la acción de actulizar el formulario --}}
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>