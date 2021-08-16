<div class="modal fade show" id="modal-table-settings" style="display: none; padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
        <div class="modal-header">
            <h4 class="modal-title">Настройки</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form action="{{ route('category.index') }}" method="GET" id="settingsForm">
            @csrf
            <div class="modal-body">
                <div class="input-group d-flex align-items-center">
                    <label class="mb-0 mr-2">Количество записей</label><input type="number" class="form-control" placeholder="Количество записей" name="recordCount" min=1 max=100 value='{{ $limit }}'>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Закыть</button>
                <div>
                    <button type="submit" class="btn btn-outline-dark">Применить</button>
                </div>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>