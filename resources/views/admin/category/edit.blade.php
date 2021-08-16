@extends('layouts.admin')

@section('title', 'Редактирование категории')
@section('content')
<section class="content  pt-4">
    <div class="container-fluid">
        <div style="max-width: 600px">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title mb-0">Редактирование категории</h3>
            </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form class="addForm" action="{{ route('category.update', $category['id']) }}" method="POST" enctype="multipart/form-data" id="editForm">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название*</label>
                        <input type="text" name="title" value="{{ $category->title }}" class="form-control" placeholder="Введите название категории" required>
                        <p class="text-danger error-message" error-message id="error-title" style="display: none"></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Псевдоним*</label>
                        <input type="text" name="alias" value="{{ $category->alias }}" class="form-control" placeholder="Введите псевдоним, который будет использоваться в url" required>
                        <p class="text-danger error-message" error-message id="error-alias" style="display: none"></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Описание</label>
                        <div>
                            <textarea class="form-control" name="description" placeholder="Введите описание категории">{{ $category->description }}</textarea>
                            <p class="text-danger error-message" error-message id="error-description" style="display: none"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputFile">Фотография
                            <small class="ml-1">(максимальный вес: {{ env('MAX_LOGO_SIZE', 200) }} КБ)</small>
                        </label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input" id="inputFile">
                                <label class="custom-file-label" for="inputFile">Выбирете файл</label>
                            </div>
                        </div>
                        <p class="text-danger error-message" error-message id="error-img" style="display: none"></p>
                    </div>
                    <div id="imgBlock">
                        @if($category->img)
                        <div class="form-group">
                            <div class="input-group">
                                <img src="{{ '/storage/' . $category->img }}" style="max-width: 100%" class="categoryImg">
                            </div>
                            <input type="hidden" name='deleteImg' value="false">
                            <button type="button" class="btn btn-danger mt-2" btn-delete-img><i class="fas fa-trash"></i></button>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Обновить</button>
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
<script src="/js/singl/category.js"></script>
<script>
    $(function () {
    bsCustomFileInput.init();
    });
</script>
@endsection