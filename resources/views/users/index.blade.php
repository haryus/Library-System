@extends('layouts.app')

@section('header-title')
User Management
@endsection

@section('header-scripts')

<script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

@endsection

@section('top-actions')

    <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default" data-toggle="modal" data-target="#add-modal">
        <i class="icon-plus3 text-pink-300"></i>
        <span>Add User</span>
    </a>
@endsection


@section('page-content')

<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Users List</h5>
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
          <th>Userame</th>
          <th>Full Name</th>
          <th>Date Created</th>
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
          <h5 class="modal-title">Add User</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" action="{{ route('users.store') }}" method="POST">
          @csrf
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Name:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="name" required placeholder="Name">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">User Name:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="username" required placeholder="User Name">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Password:</label>
            <div class="col-lg-9">
              <input type="password" class="form-control" name="password" required placeholder="Password">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Confirm Password:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
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
          <h5 class="modal-title">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" id="formEdit" action="" method="POST">
          @method('patch')
          @csrf
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Name:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="name" name="name" required placeholder="Name">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">User Name:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="username" name="username" required placeholder="User Name">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Password:</label>
            <div class="col-lg-9">
              <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Confirm Password:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Confirm Password">
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
          <h5 class="modal-title">Delete User</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" id="formDelete" action="" method="POST">
          @method('delete')
          @csrf
  
          Are you sure you want to delete this user?
  
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
            ajax: '{!! route('users.data_users') !!}',
            columns: [
                { data: 'username', name: 'username'},
                { data: 'name', name: 'name'},
                { data: 'created_at', name: 'created_at',  searchable: false},
                { data: 'action',name: 'action', orderable: false, searchable: false }
            ]
        });

        $('body').on('click', '#edit-user', function () {
            var id = $(this).data('id');
            $.get('users/'+id+'/edit', function(data) {
                $('#edit-modal').modal('show');
                $('#formEdit').attr('action', 'users/'+ id);
                $('#username').val(data.username)
                $('#name').val(data.name)
            })
        });
        $('body').on('click', '#delete-user', function () {
            var id = $(this).data('id');
            $('#delete-modal').modal('show');
            $('#formDelete').attr('action', 'users/'+ id)
        });

        
    })
</script>
@endsection