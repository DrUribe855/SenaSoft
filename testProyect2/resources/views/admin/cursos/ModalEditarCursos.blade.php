
<div class="modal fade" id="modalEditarCursos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar curso</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <form  action=" {{ route('cursos.update', $curso) }}" method="POST" > 
                  @csrf
                  @method('PATCH')
                      <div class="form-group">
                        <label>ID curso</label>
                        <input class="form-control" type="text" name="id" value=" {{ $curso->id }} ">
                      </div>
                      <div class="form-group">
                        <label for="">Nombre</label>
                        <input class="form-control" type="text" name="nombre" value=" {{ $curso->nombre }} ">
                      </div>
                      <div class="form-group">
                        <label for="">Horas</label>
                        <input class="form-control" type="text" name="horas" value=" {{ $curso->horas}} ">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                      </div>
                  </form>
            </div>
            
        </div>
    </div>
</div>
