@extends('layouts.admin')

@section('title', 'Редактирование товара')
@section('content')
@include('admin.components.modals.product.searchCategory')
<section class="content  pt-4">
    <div class="container-fluid">
        <div style="max-width: 600px">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title mb-0">Редактирование товара</h3>
            </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form class="addForm" action="{{ route('product.update', $product['id']) }}" method="POST" enctype="multipart/form-data" id="editForm">
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название*</label>
                        <input type="text" name="title" class="form-control" placeholder="Введите название товара" value="{{ $product->title }}" required>
                        <p class="text-danger error-message" error-message id="error-title" style="display: none"></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Псевдоним*</label>
                        <input type="text" name="alias" class="form-control" placeholder="Введите псевдоним, который будет использоваться в url" value="{{ $product->alias }}" required>
                        <p class="text-danger error-message" id="error-alias" style="display: none"></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Цена*
                            <small class="ml-1">(в рублях)</small>
                        </label>
                        <div class="input-group">
                            <input type="number" name="price" class="form-control" placeholder="Введите цену товара" value="{{ $product->price }}" required>
                            <input type="number" name="new_price" class="form-control" placeholder="Введите новую цену товара" value="{{ $product->new_price }}">
                        </div>
                        <p class="text-danger error-message" id="error-price" style="display: none"></p>
                        <p class="text-danger error-message" id="error-new_price" style="display: none"></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Категория
                            <small class="ml-1">(в списке предоставлены первые {{ $limit }} совпадений)</small>
                        </label>
                        <div class="input-group">
                            <select class="form-control" placeholder="Категория" id="category" name="category">
                                <option value=''>Нету</option>
                                @php
                                    $selected = null;
                                @endphp
                                @if($product && $product->category)
                                    @php
                                        $selected = $product->category->id;
                                    @endphp
                                    <option value='{{ $product->category->id }}' selected>{{ $product->category->title }}</option>
                                @endif
                                @foreach($categories as $category)
                                    @if($selected != $category->id)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger" id="btn-modal-reset" method="GET" action="{{ route('product.create') }}" product_id="{{ $product->id }}">
                                    <i class="fas fa-redo-alt"></i>
                                </button>
                            </div>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" id="btn-modal-search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <p class="text-danger error-message" id="error-category" style="display: none"></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Описание</label>
                        <div>
                            <textarea class="form-control" name="description" placeholder="Введите описание товара">{{ $product->description }}</textarea>
                            <p class="text-danger error-message" error-message id="error-description" style="display: none"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Наличие</label>
                        <div>
                            <span class="d-flex align-items-center"><input type="radio" name="is_stoke" id="is_stoke_true" value="true" {{ $product->is_stoke? 'checked' : '' }}><label class="ml-1 mb-0 font-weight-normal" for="is_stoke_true">Есть в наличие</label></span>
                        </div>
                        <div>
                            <span class="d-flex align-items-center"><input type="radio" name="is_stoke" {{ $product->is_stoke? '' : 'checked' }} id="is_stoke_false" value="false"><label class="ml-1 mb-0 font-weight-normal" for="is_stoke_false">Под заказ</label></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="d-flex justify-content-between form-group">
                                <label for="inputFile">Характеристики</label>
                                <button type="button" class="btn btn-primary" id="addChar"><i class="fas fa-plus"></i></button>
                            </div>
                            <div id="charList">
                                @foreach($product->characteristics as $char)
                                    <div class="form-group" block charBlock>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <input type="hidden" name='deleteChar[{{ $char->id }}]' value="false" deleteChar>
                                                <button type="button" class="btn btn-danger" delete-block-id="{{ $char->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="editCharName[{{ $char->id }}]" class="form-control" placeholder="Название" value="{{ $char->name }}" required>
                                            <input type="text" name="editCharValue[{{ $char->id }}]" class="form-control" placeholder="Значение" value="{{ $char->value }}" required>
                                        </div>
                                        <p class="text-danger error-message" error-message style="display: none" edit-char-name-error></p>
                                        <p class="text-danger error-message" error-message style="display: none" edit-char-value-error></p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="d-flex justify-content-between form-group">
                                <label for="inputFile">Фотографии
                                    <small class="ml-1">(максимальный вес: {{ env('MAX_IMG_SIZE', 100) }} КБ, соотношение сторон 1x1)</small>
                                </label>
                                <button type="button" class="btn btn-primary" id="addPhoto"><i class="fas fa-plus"></i></button>
                            </div>
                            <div id="imgList"> 
                                <div id="imgBlock">
                                    @foreach($product->images as $image)
                                        <div class="form-group">
                                            <div class="input-group">
                                                <img src="{{ '/storage/' . $image->img }}" class="productImg">
                                            </div>
                                            <input type="hidden" name='deleteImg[{{ $image->id }}]' value="false" deleteImg>
                                            <button type="button" class="btn btn-danger mt-2" btn-delete-img server-delete><i class="fas fa-trash"></i></button>
                                        </div>
                                    @endforeach
                                </div>
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