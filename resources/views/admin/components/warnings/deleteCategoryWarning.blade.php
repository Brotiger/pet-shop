<div class="modal fade show" id="modal-warning" style="display: none; padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
        <div class="modal-header">
            <h4 class="modal-title">Внимание!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form id="deleteForm">
                <div class="modal-body">
                    <p>Вы уверены что хотите удалить запись с ID: <span id="delete-record-id-block"></span>?</p>
                    <div class="form-group">
                        <label>Параметры удаления</label>
                        <div>
                            <span class="d-flex align-items-center"><input type="radio" name="delete_type" id="delete_category" value="singl"><label class="ml-1 mb-0 font-weight-normal" for="delete_category">Только категорию</label></span>
                        </div>
                        <div>
                            <span class="d-flex align-items-center"><input type="radio" name="delete_type" checked id="delete_all" value="all"><label class="ml-1 mb-0 font-weight-normal" for="delete_all">Категорию и ее товары</label></span>
                        </div>
                    </div>
                    <p class="mb-0">В случае удаления только категории все товары из данной категории автоматически переместятся в раздел - "Разное".</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-outline-dark">Удалить</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>