@extends('layouts.admin')

@section('title', 'Все товары')
@section('content')
@include('admin.components.warnings.deleteProductWarning')
@include('admin.components.modals.categoryList.searchCategory')
<section class="content pt-4">
    <div class="container-fluid" id="table">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title mb-0">Все товары</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" id="btn-modal-reset" method="GET" action="{{ route('product.index') }}">
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
                        Категория
                      </th>
                      <th>
                        Псевдоним
                      </th>
                      <th>
                        Наличие
                      </th>
                      <th>
                        Цена
                      </th>
                      <th>
                        Новая цена
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($products as $product)
                  <tr>
                      <td>
                        {{ $product->id }}
                      </td>
                      <td>
                        {{ $product->title }}
                      </td>
                      <td>
                        {{ !empty($product->category)? $product->category->title : 'Разное' }}
                      </td>
                      <td>
                        {{ $product->alias }}
                      </td>
                      <td>
                        {{ $product->is_stoke == 1? 'Есть в наличие' : 'Под заказ' }}
                      </td>
                      <td>
                        {{ $product->price }} р.
                      </td>
                      <td>
                        {{ $product->new_price? $product->new_price . ' р.' : ''}}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="{{ route('product.edit', $product['id']) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Редактировать
                          </a>
                            <button class="btn btn-danger btn-sm delete-btn" type="button" delete-id="{{ $product->id }}" action="{{ route('product.destroy', $product['id']) }}">
                                <i class="fas fa-trash">
                                </i>
                                Удалить
                            </button>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div>
        {{ $products->appends($next_query)->links('pagination.admin.bootstrap-4-v2') }}
      </div>
    </div>
</section>    
  <!-- /.content-header -->
@endsection
@section('custom_js')
<script src="/js/singl/deleteProductRecord.js"></script>
<script src="/js/singl/forms.js"></script>
<script src="/js/singl/searchRecord.js"></script>
@endsection