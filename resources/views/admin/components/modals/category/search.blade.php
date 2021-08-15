<div class="modal fade show" id="modal-search" style="display: none; padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
        <div class="modal-header">
            <h4 class="modal-title">Поиск</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form action="{{ route('category.index') }}" method="GET" id="searchForm">
            @csrf
            <div class="modal-body">
                <div class="input-group">
                    <input type="number" class="form-control" placeholder="ID" name="id">
                </div>
                <div class="input-group mt-2">
                    <input type="test" class="form-control" placeholder="Название" name="title">
                </div>
                <div class="input-group mt-2">
                    <input type="text" class="form-control" placeholder="Псевдоним" name="alias">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Закыть</button>
                <div>
                    <button type="button" class="btn btn-outline-dark" id="btn-clear-search">Очистить</button>
                    <button type="submit" class="btn btn-outline-dark">Поиск</button>
                </div>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>