@include('admin.components.warnings.deleteWarning')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title mb-0">Все категории</h3>
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
                            <button class="btn btn-danger btn-sm delete-btn" type="button" delete-id="{{ $category->id }}" action="{{ route('category.destroy', $category['id']) }}">
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
      {{ $categories->appends($next_query)->links('pagination.admin.bootstrap-4-v2') }}