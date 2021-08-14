@extends('layouts.admin')

@section('title', 'Добавление товара')
@section('content')
@include('admin.components.modals.addProduct.searchCategory')
<section class="content  pt-4">
    <div class="container-fluid">
        <div style="max-width: 600px">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title mb-0">Добавление товара</h3>
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
                        <label for="exampleInputPassword1">Цена*
                            <small class="ml-1">(в рублях)</small>  
                        </label>
                        <div class="input-group">
                            <input type="number" name="price" class="form-control" placeholder="Введите цену товара" required>
                            <input type="number" name="new_price" class="form-control" placeholder="Введите новую цену товара">
                        </div>
                        <span class="text-danger" id="error-price" style="display: none"></span>
                        <span class="text-danger" id="error-new_price" style="display: none"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Категория
                            <small class="ml-1">(в списке предоставлены первые {{ $limit }} совпадений)</small>
                        </label>
                        <div class="input-group">
                            <select class="form-control" placeholder="Категория" id="category" name="category">
                                <option value=''>Нету</option>
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
                        <span class="text-danger" id="error-category" style="display: none"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Описание</label>
                        <div>
                            <textarea class="form-control" name="description" placeholder="Введите описание товара"></textarea>
                            <span class="text-danger" error-message id="error-description" style="display: none"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Наличие</label>
                        <div>
                            <span class="d-flex align-items-center"><input type="radio" name="is_stoke" id="is_stoke_true" value="true"><label class="ml-1 mb-0 font-weight-normal" for="is_stoke_true">Есть в наличие</label></span>
                        </div>
                        <div>
                            <span class="d-flex align-items-center"><input type="radio" name="is_stoke" checked id="is_stoke_false" value="false"><label class="ml-1 mb-0 font-weight-normal" for="is_stoke_false">Под заказ</label></span>
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
                                <label for="inputFile">Фотографии
                                    <small class="ml-1">(максимальный вес: {{ env('MAX_IMG_SIZE', 100) }} КБ)</small>
                                </label>
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