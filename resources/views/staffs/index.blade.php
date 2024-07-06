@extends('layouts.app')

@section('header-title')
Staff Management
@endsection

@section('header-scripts')

<script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

@endsection

@section('top-actions')

    <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default" data-toggle="modal" data-target="#add-modal">
        <i class="icon-plus3 text-pink-300"></i>
        <span>Add Staff</span>
    </a>
@endsection


@section('page-content')

<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Staffs List</h5>
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
          <th>First Name</th>
          <th>Last Name</th>
          <th>Position</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Hire Date</th>
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
          <h5 class="modal-title">Add Staff</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" action="{{ route('staffs.store') }}" method="POST">
          @csrf
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">First Name:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="firstName" required placeholder="First Name">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Last Name:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="lastName" required placeholder="Last Name">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Position:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="position" required placeholder="Position">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Email:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="email" required placeholder="Email">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Phone Number:</label>
            <div class="col-lg-9">
              <input maxlength="11" placeholder="09" type="text" class="form-control" name="phoneNumber" required oninput="this.value = this.value.replace(/[^0-9.]/g,'');">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">hireDate:</label>
            <div class="col-lg-9">
              <input type="date" name="hireDate" required>
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
          <h5 class="modal-title">Edit Staff</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" id="formEdit" action="" method="POST">
          @method('patch')
          @csrf
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">First Name:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Last Name:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Position:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="position" name="position" placeholder="Position">
            </div>
          </div> 
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Email:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="email" id="email" required>
            </div>
          </div>  
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Phone Number:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" required oninput="this.value = this.value.replace(/[^0-9.]/g,'');">
            </div>
          </div> 
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Hire Date:</label>
            <div class="col-lg-9">
              <input type="date" class="form-control" name="hireDate" id="hireDate" required>
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
          <h5 class="modal-title">Delete Staff</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" id="formDelete" action="" method="POST">
          @method('delete')
          @csrf
  
          Are you sure you want to delete this staff?
  
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
            ajax: '{!! route('staffs.data_staffs') !!}',
            columns: [
                { data: 'firstName', name: 'firstName'},
                { data: 'lastName', name: 'lastName'},
                { data: 'position', name: 'position'},
                { data: 'email', name: 'email'},
                { data: 'phoneNumber', name: 'phoneNumber'},
                { data: 'hireDate', name: 'hireDate'},
                { data: 'action',name: 'action', orderable: false, searchable: false }
            ]
        });

        $('body').on('click', '#edit-staff', function () {
            var id = $(this).data('id');
            $.get('staffs/'+id+'/edit', function(data) {
                $('#edit-modal').modal('show');
                $('#formEdit').attr('action', 'staffs/'+ id);
                $('#firstName').val(data.firstName)
                $('#lastName').val(data.lastName)
                $('#position').val(data.position)
                $('#email').val(data.email)
                $('#phoneNumber').val(data.phoneNumber)
                $('#hireDate').val(data.hireDate)
            })
        });
        $('body').on('click', '#delete-staff', function () {
            var id = $(this).data('id');
            $('#delete-modal').modal('show');
            $('#formDelete').attr('action', 'staffs/'+ id)
        });

        
    })
</script>
@endsection