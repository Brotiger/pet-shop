@extends('layouts.admin')

@section('title', 'Все категории')
@section('content')
<section class="content  pt-4">
    <div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success d-flex justify-content-between align-items-center">
            <strong><i class="fas fa-check"></i> {{ session('success') }}</strong>
            <button type="button" class="btn-close" btn-close><i class="far fa-times-circle"></i></button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Все категории</h3>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th>
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
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              Просмотр
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ route('category.edit', $category['id']) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Редактировать
                          </a>
                          <form action="{{ route('category.destroy', $category['id']) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm delete-btn" type="submit">
                                <i class="fas fa-trash">
                                </i>
                                Удалить
                            </button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</section>    
  <!-- /.content-header -->
@endsection