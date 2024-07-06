@extends('layouts.app')

@section('header-title')
Book Management
@endsection

@section('header-scripts')

<script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

@endsection

@section('top-actions')

    <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default" data-toggle="modal" data-target="#add-modal">
        <i class="icon-plus3 text-pink-300"></i>
        <span>Add Book</span>
    </a>
@endsection


@section('page-content')

<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Books List</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
        <a class="list-icons-item" data-action="remove"></a>
      </div>
    </div>
  </div>

  <div class="card-body">
      
    <div class="table-responsive">
      <table id="example2" class="table table-xs" style="width:100%">
        <thead>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>ISBN</th>
          <th>Genre</th>
          <th>Publisher</th>
          <th>Publisher Year</th>
          <th>Price</th>
          <th>Stock Quantity</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
        </thead>
      </table>
    </div>

  </div>
</div>


<div id="add-modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Book</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Title:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="title" required placeholder="Title">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Author:</label>
            <div class="col-lg-9">
              <select name="author" class="form-control form-control-select2">
                @foreach ($authors as $author)
                  <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">ISBN:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="isbn" required placeholder="ISBN">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Genre:</label>
            <div class="col-lg-9">
              <select name="genre" class="form-control form-control-select2">
                @foreach ($genres as $genre)
                  <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                @endforeach
              </select>
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Publisher:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="publisher" required placeholder="Publisher">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Publisher Year:</label>
            <div class="col-lg-9">
              <input type="number" maxlength="4" class="form-control" name="publisherYear" required placeholder="Publisher">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Price:</label>
            <div class="col-lg-9">
              <input type="text" value="0.00" class="form-control" name="price" required placeholder="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g,'');">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Stock Quantity:</label>
            <div class="col-lg-9">
              <input type="number" class="form-control" name="stockQuantity" required placeholder="0">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Image:</label>
            <div class="col-lg-9">
              <input type="file" class="form-control" name="img" required>
            </div>
          </div>
        </div>
  
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-primary">Save</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  
  
  <div id="edit-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Book</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" id="formEdit" action="" method="POST" enctype="multipart/form-data">
          @method('patch')
          @csrf
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Title:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Author:</label>
            <div class="col-lg-9">
              <select name="author" id="author" class="form-control form-control-select2" data-fouc>
                @foreach ($authors as $author)
                  <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">ISBN:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Genre:</label>
            <div class="col-lg-9">
              <select name="genre" id="genre" class="form-control form-control-select2" data-fouc>
                @foreach ($genres as $genre)
                  <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                @endforeach
              </select>
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Publisher:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="publisher" id="publisher" required placeholder="Publisher">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Publisher Year:</label>
            <div class="col-lg-9">
              <input type="number" maxlength="4" class="form-control" name="publisherYear" id="publisherYear" required placeholder="Publisher">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Price:</label>
            <div class="col-lg-9">
              <input type="text" value="0.00" class="form-control" name="price" id="price" required placeholder="0.00" oninput="this.value = this.value.replace(/[^0-9.]/g,'');">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Stock Quantity:</label>
            <div class="col-lg-9">
              <input type="number" class="form-control" name="stockQuantity" id="stockQuantity" required placeholder="0">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Current Image:</label>
            <div class="col-lg-9">
              <img id="current-image" style="max-width: 100%; max-height:150px;"/>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-3 col-form-label">New Image:</label>
            <div class="col-lg-9">
              <input type="file" name="img" id="img">
            </div>
          </div>
        </div>
  
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-primary">Save</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  
  
  <div id="delete-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Book</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" id="formDelete" action="" method="POST">
          @method('delete')
          @csrf
  
          Are you sure you want to delete this book?
  
        </div>
  
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-primary">Delete</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  
@endsection

@section('footer-scripts')
<script>
    $(function () {
        $('.form-control-select2').select2();
        $('#example2').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('books.data_books') !!}',
            columns: [
                { data: 'title', name: 'title'},
                { data: 'author.name', name: 'author.name'},
                { data: 'isbn', name: 'isbn'},
                { data: 'genre.genre', name: 'genre.genre'},
                { data: 'publisher', name: 'publisher'},
                { data: 'publisherYear', name: 'publisherYear'},
                { data: 'price', name: 'price'},
                { data: 'stockQuantity', name: 'stockQuantity'},
                { data: 'img', name: 'img', orderable: false, searchable: false },
                { data: 'action',name: 'action', orderable: false, searchable: false }
            ]
        });

        $('body').on('click', '#edit-book', function () {
            var id = $(this).data('id');
            $.get('books/'+id+'/edit', function(data) {
                $('#edit-modal').modal('show');
                $('#formEdit').attr('action', 'books/'+ id);
                $('#title').val(data.title)
                $('#author').val(data.author).trigger('change')
                $('#isbn').val(data.isbn)
                $('#genre').val(data.genre).trigger('change')
                $('#publisher').val(data.publisher)
                $('#publisherYear').val(data.publisherYear)
                $('#price').val(data.price)
                $('#stockQuantity').val(data.stockQuantity)
                $('#current-image').attr('src',data.img)
                $('#edit_img').val('');

            })
        });
        $('#edit_img').change(function() {
          var input = this;
          var url = URL.createObjectURL(input.files[0]);
          var imgElement = '<img src="'+url +'" alt="" style="max-width:100px;max-height:100px;">';
          $('#edit_img_preview').html(imgElement);
        });
        $('body').on('click', '#delete-book', function () {
            var id = $(this).data('id');
            $('#delete-modal').modal('show');
            $('#formDelete').attr('action', 'books/'+ id)
        });

        
    })
</script>
@endsection