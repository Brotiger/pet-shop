@extends('layouts.admin')

@section('title', 'Все категории')
@section('content')
@include('admin.components.warnings.deleteCategoryWarning')
@include('admin.components.modals.category.search')
<section class="content pt-4">
    <div class="container-fluid" id="table">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title mb-0">Все категории</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" id="btn-modal-reset" method="GET" action="{{ route('category.index') }}">
              <i class="fas fa-redo-alt"></i>
            </button>
            <button type="button" class="btn btn-tool" id="btn-modal-search">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 5%">
                          ID
                      </th>
                      <th>
                          Название
                      </th>
                      <th>
                        Псевдоним
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($categories as $category)
                  <tr>
                      <td>
                        {{ $category->id }}
                      </td>
                      <td>
                        {{ $category->title }}
                      </td>
                      <td>
                        {{ $category->alias }}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{ route('product.index', ['category' => $category['alias']]) }}">
                              <i class="fas fa-folder">
                              </i>
                              Просмотр
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ route('category.edit', $category['id']) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Редактировать
                          </a>
                          <!--<form action="{{ route('category.destroy', $category['id']) }}" method="POST" class="d-inline" deleteForm>-->
                            <button class="btn btn-danger btn-sm delete-btn" type="button" delete-id="{{ $category->id }}" action="{{ route('category.destroy', $category['id']) }}">
                                <i class="fas fa-trash">
                                </i>
                                Удалить
                            </button>
                          <!--</form>-->
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div>
        {{ $categories->appends($next_query)->links('pagination.admin.bootstrap-4-v2') }}
      </div>
    </div>
</section>    
  <!-- /.content-header -->
@endsection
@section('custom_js')
<script src="/js/singl/deleteCategoryRecord.js"></script>
<script src="/js/singl/forms.js"></script>
<script src="/js/singl/searchRecord.js"></script>
@endsection