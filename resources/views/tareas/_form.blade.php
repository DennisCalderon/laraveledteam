<form method="post" action="" class="col-md-12 col12">
    <div class=="row">
        {{ csrf_field() }}  {{-- sin está funciona no podemos guardar información ya que se encarga de la seguridad  --}}
        <div class="col-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Título:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required="required" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Prioridad:</label>
                            <select id="prioridad_id" name="prioridad_id" class="form-control">
                                <option value="0">Selecciona</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <span class="text-danger">*&nbsp;</span><label>Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>