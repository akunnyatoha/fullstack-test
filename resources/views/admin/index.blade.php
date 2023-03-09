@extends('admin.main')
@section('content')
<div class="container">
    @if (session()->has('success'))
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
      <div class="card">
          <div class="card-header">
              <h4>Master Categories</h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table text-center">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Category</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data as $item)
                        <tr>
                          <td><?= $i; ?></td>
                          <td>{{$item->title}}</td>
                          <td>
                             <button class="btn btn-primary" id="button-edit" data-idp="{{$item->id}}">Edit</button>
                             <a class="btn btn-primary" href="/dahsboard/masterCategories/destroy/{{$item->id}}" onclick="return confirm('Apakah anda yakin akan menghapus data?')">Delete</a>
                          </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                      </tbody>
                  </table>
              </div>
              <div class="mb-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create">
                    Tambah Data
                </button>
              </div>
          </div>
      </div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="modal-createLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-createLabel">Tambah Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/dahsboard/masterCategories" method="post">
                @csrf
                <div class="modal-body">
                    <label for="title" class="form-label">Nama Category</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
                    @error('title')
                        <div class="invalid-feedback mb-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="modal-updateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-updateLabel">Update Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="form-update">
                @csrf
                <div class="modal-body">
                    <label for="title" class="form-label">Nama Category</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title-update">
                    @error('title')
                        <div class="invalid-feedback mb-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

  <script>
    $('.table').on('click', '#button-edit', function() {
                const id = $(this).attr('data-idp');
                console.log(id);
                document.getElementById('form-update').action = `{{url('/masterCategories/update?id=')}}${id}`;
                $('#modal-update').modal('show');
                $.ajax({
                    method: 'GET',
                    url: '/masterCategories/edit',
                    data: {
                    id: id,
                    },
                    success: (data) => {
                        console.log(data);
                        $('#title-update').val(data.title);
                        $("#modal-update").modal('show');
                    }
                });
            });
  </script>

@endsection