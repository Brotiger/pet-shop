@extends('layouts.admin')

@section('title', 'Добавление товара')
@section('content')
@include('admin.components.modals.addProduct.searchCategory')
<section class="content  pt-4">
    <div class="container-fluid">
        <div style="max-width: 600px">
        <div class="card card-primary">
            <div class="card-header">
                Добавление товара
            </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form class="addForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" id="addForm">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название*</label>
                        <input type="text" name="title" class="form-control" placeholder="Введите название товара" required>
                        <span class="text-danger" error-message id="error-title" style="display: none"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Псевдоним*</label>
                        <input type="text" name="alias" class="form-control" placeholder="Введите псевдоним, который будет использоваться в url" required>
                        <span class="text-danger" id="error-alias" style="display: none"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Категория</label>
                        <div class="input-group">
                            <select class="form-control" placeholder="Категория" required id="category">
                                <option value="null">Нету</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger" id="btn-modal-reset" method="GET" action="{{ route('product.create') }}">
                                    <i class="fas fa-redo-alt"></i>
                                </button>
                            </div>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" id="btn-modal-search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <span class="text-danger" id="error-alias" style="display: none"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Описание</label>
                        <div>
                            <textarea class="form-control" name="description" placeholder="Введите описание товара"></textarea>
                            <span class="text-danger" error-message id="error-description" style="display: none"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="d-flex justify-content-between form-group">
                                <label for="inputFile">Характеристики</label>
                                <button type="button" class="btn btn-primary" id="addChar"><i class="fas fa-plus"></i></button>
                            </div>
                            <div id="charList">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="d-flex justify-content-between form-group">
                                <label for="inputFile">Фотографии</label>
                                <button type="button" class="btn btn-primary" id="addPhoto"><i class="fas fa-plus"></i></button>
                            </div>
                            <div id="photoList">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>    
  <!-- /.content-header -->
@endsection
@section('custom_js')
<!-- bs-custom-file-input -->
<script src="/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script src="/js/singl/product.js"></script>
@endsection