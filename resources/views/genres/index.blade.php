@extends('layouts.app')

@section('header-title')
Genre Management
@endsection

@section('header-scripts')

<script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

@endsection

@section('top-actions')

    <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default" data-toggle="modal" data-target="#add-modal">
        <i class="icon-plus3 text-pink-300"></i>
        <span>Add Genre</span>
    </a>
@endsection


@section('page-content')

<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Genres List</h5>
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
          <th>Genre</th>
          <th>Description</th>
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
          <h5 class="modal-title">Add Genre</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" action="{{ route('genres.store') }}" method="POST">
          @csrf
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Genre:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="genre" required placeholder="Genre">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Description:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="description" required placeholder="Description">
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
          <h5 class="modal-title">Edit Genre</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" id="formEdit" action="" method="POST">
          @method('patch')
          @csrf
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Genre:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="genre" name="genre" placeholder="Genre">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Description:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="description" name="description" placeholder="Description">
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
          <h5 class="modal-title">Delete Genre</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" id="formDelete" action="" method="POST">
          @method('delete')
          @csrf
  
          Are you sure you want to delete this genre?
  
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
            ajax: '{!! route('genres.data_genres') !!}',
            columns: [
                { data: 'genre', name: 'genre'},
                { data: 'description', name: 'description'},
                { data: 'action',name: 'action', orderable: false, searchable: false }
            ]
        });

        $('body').on('click', '#edit-genre', function () {
            var id = $(this).data('id');
            $.get('genres/'+id+'/edit', function(data) {
                $('#edit-modal').modal('show');
                $('#formEdit').attr('action', 'genres/'+ id);
                $('#genre').val(data.genre)
                $('#description').val(data.description)
            })
        });
        $('body').on('click', '#delete-genre', function () {
            var id = $(this).data('id');
            $('#delete-modal').modal('show');
            $('#formDelete').attr('action', 'genres/'+ id)
        });

        
    })
</script>
@endsection