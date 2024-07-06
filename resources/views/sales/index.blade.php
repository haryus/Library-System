@extends('layouts.app')

@section('header-title')
Sale Management
@endsection

@section('header-scripts')

<script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

@endsection

@section('top-actions')

    <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default" data-toggle="modal" data-target="#add-modal">
        <i class="icon-plus3 text-pink-300"></i>
        <span>Buy a Book</span>
    </a>
@endsection


@section('page-content')

<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Sales List</h5>
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
          <th>Customer</th>
          <th>Book</th>
          <th>Quantity</th>
          <th>Purchased Date</th>
          <th>Total Price</th>
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
          <h5 class="modal-title">Add Sale</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" action="{{ route('sales.store') }}" method="POST">
          @csrf
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Customer Name:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="customerName" required placeholder="Customer Name">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Book:</label>
            <div class="col-lg-9">
              <select name="bookID" class="form-control form-control-select2" onchange="calculateTotal(this)">
                @foreach ($books as $book)
                  <option value="{{ $book->id }}" data-price="{{ $book->price }}">{{ $book->title }}</option>
                @endforeach
              </select>
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Quantity:</label>
            <div class="col-lg-9">
              <input type="number" class="form-control" name="quantity" required placeholder="Quantity" oninput="calculateTotal(this)">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Sale Date:</label>
            <div class="col-lg-9">
              <input type="date" class="form-control" name="saleDate" required placeholder="Sale Date">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Total Price:</label>
            <div class="col-lg-9">
              <input maxlength="11" placeholder="Total Price" type="text" class="form-control" name="totalPrice" required readonly>
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
          <h5 class="modal-title">Edit Sale</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" id="formEdit" action="" method="POST">
          @method('patch')
          @csrf
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Customer Name:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="customerName" id="customerName" required placeholder="Customer Name">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Book:</label>
            <div class="col-lg-9">
              <select name="bookID" id="bookID" class="form-control form-control-select2"  onchange="calculateTotal(this)">
                @foreach ($books as $book)
                  <option value="{{ $book->id }}" data-price="{{ $book->price }}">{{ $book->title }}</option>
                @endforeach
              </select>
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Quantity:</label>
            <div class="col-lg-9">
              <input type="number" class="form-control" name="quantity" id="quantity" required placeholder="Quantity"  oninputs="calculateTotal(this)">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Sale Date:</label>
            <div class="col-lg-9">
              <input type="date" class="form-control" name="saleDate" id="saleDate required placeholder="Sale Date">
            </div>
          </div>
  
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Total Price:</label>
            <div class="col-lg-9">
              <input maxlength="11" placeholder="Total Price" type="text" class="form-control" name="totalPrice" id="totalPrice" required readonly>
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
          <h5 class="modal-title">Delete Sale</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
          <form name="Form" id="formDelete" action="" method="POST">
          @method('delete')
          @csrf
  
          Are you sure you want to delete this sale?
  
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
  function calculateTotal(element){
    var form = element.form;
    var bookID = form.elements['bookID'].value;
    var quantity = form.elements['quantity'].value;
    var bookPrice = form.elements['bookID'].querySelector(`option[value="${bookID}"]`).getAttribute('data-price');
    var totalPrice = parseFloat(bookPrice) * parseInt(quantity);
    form.elements['totalPrice'].value = totalPrice.toFixed(2);
  }

  function calculateEditTotal(){
    var bookID = document.getElementById('bookID').value;
    var quantity = document.getElementById('quantity').value;
    var bookPrice = document.querySelector(`option[value="${bookID}"]`).getAttribute('data-price');
    var totalPrice = parseFloat(bookPrice) * parseInt(quantity);
    document.getElementById('totalPrice').value = totalPrice.toFixed(2);
  }
    $(function () {
        $('.form-control-select2').select2();
        $('#example2').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('sales.data_sales') !!}',
            columns: [
                { data: 'customerName', name: 'customerName'},
                { data: 'book.title', name: 'book.title'},
                { data: 'quantity', name: 'quantity'},
                { data: 'saleDate', name: 'saleDate'},
                { data: 'totalPrice', name: 'totalPrice'},
                { data: 'action',name: 'action', orderable: false, searchable: false }
            ]
        });

        $('body').on('click', '#edit-sale', function () {
            var id = $(this).data('id');
            $.get('sales/'+id+'/edit', function(data) {
                $('#edit-modal').modal('show');
                $('#formEdit').attr('action', 'sales/'+ id);
                $('#firstName').val(data.firstName)
                $('#lastName').val(data.lastName)
                $('#position').val(data.position)
                $('#email').val(data.email)
                $('#phoneNumber').val(data.phoneNumber)
                $('#hireDate').val(data.hireDate)
            })
        });
        $('body').on('click', '#delete-sale', function () {
            var id = $(this).data('id');
            $('#delete-modal').modal('show');
            $('#formDelete').attr('action', 'sales/'+ id)
        });

        
    })
</script>
@endsection