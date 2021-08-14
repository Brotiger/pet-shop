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
                    <p class="mb-0">Вы уверены что хотите удалить запись с ID: <span id="delete-record-id-block"></span>?</p>
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