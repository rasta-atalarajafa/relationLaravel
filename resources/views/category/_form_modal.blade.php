<div class="modal fade" id="modal-form">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="formModalLabel">Form Kategori</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="input-name">Nama Kategori</label>
                        <input type="text" name="name" id="input-name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="input-slug">Slug Url</label>
                        <input type="text" name="name_clean" id="input-slug" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-save" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>