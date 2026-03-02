<form action="<?= url('intranet/item/create') ?>" method="post" class="row" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Nuevo Item</b></h4>
                <button type="button" class="close link_close_popup" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="input-group">
                            <label style="margin-top:5px"><b>Título:  </b></label>
                            <input type="text" name="title" class="form-control ml-2" required>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="input-group">
                            <label style="margin-top:5px"><b>Tipo: </b></label>
                            <select name="type" class="form-control" style="margin-left: 18px" required>
                                <option value="1" selected>servicio</option>
                                <option value="2">producto</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for=""><b>Descripción: </b></label>
                        <textarea name="description" cols="30" rows="5" class="form-control" style="resize: none" required></textarea>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for=""><b>Imagen: </b></label>
                        <input type="file" name="image">
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="submit" class="form-control btn btn-success" value="REGISTRAR" style="width:auto;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>