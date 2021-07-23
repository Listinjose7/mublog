@extends('master')
@section('content')

<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https:////cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{asset('public/js/jquery-3.4.1.min.js')}}"></script>


<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Laravel 5.8 Ajax Crud Tutorial - Delete or Remove Data</h3>
     <br />
     <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
     </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
   
     <br />
   <div class="table-responsive">
    <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    
                    <th>Package Name</th>
                    
                    <th>Item Product</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                <tr>
                    <td>{{$package->package_name}}</td>
                    <td>{{$package->item_product}}</td>
                    
                    
                    <td>
                         <a href="#" class="btn btn-info btn-sm update-record" data-package_id="{{ $package->package_id }}" data-package_name="{{ $package->package_name }}">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm delete-record" data-package_id="{{ $package->package_id }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
             
        </table>
   </div>
   <br />
   <br />
  </div>
 </body>
</html>

<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
        <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Package</label>
                    <div class="col-sm-10">
                      <input type="text" name="package" class="form-control" placeholder="Package Name" >
                    </div>
                </div><div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product</label>
                    <div class="col-sm-10">
                        <select class="multi-select" name="product[]" data-width="100%" data-live-search="true" multiple required>
                          
                            
                           
    @foreach($products as $product)
        <option value="{{$product->prodct_id}}">{{$product->product_name}}</option>
    @endforeach
                            
                        </select>
                    </div>
                    </select>
 
                </div>
 
              </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="actions" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action" class="btn btn-warning" value="Add" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>
 <form action="{{ route('detail.updated') }}" method="POST">
     <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
      <input type="hidden" name="_method" value="PUT">
        <div class="modal fade" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
 
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Package</label>
                    <div class="col-sm-10">
                      <input type="text" name="package_edit" class="form-control" placeholder="Package Name" >
                    </div>
                </div>
                
  

    
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product</label>
                    <div class="col-sm-10">
                        <select class="multi-select strings" name="product_edit[]" data-width="100%" data-live-search="true" multiple required>
                             
                                                   
    @foreach($products as $product)
        <option value="{{$product->prodct_id}}">{{$product->product_name}}</option>
    @endforeach 
                        </select>
                    </div>
                </div>
 
              </div>
              <div class="modal-footer">
                <input type="hidden" name="edit_id" required>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-sm">Update</button>
              </div>
            </div>
          </div>
        </div>
    </form>
   <form action="{{ route('detail.delete') }}" method="post">
        <div class="modal fade" id="DeleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
               
              </div>
              <div class="modal-body">
 
                <h4>Are you sure to delete this package?</h4>
 
              </div>
              <div class="modal-footer">
                <input type="hidden" name="delete_id" required>
                 <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> 
                    <input type="hidden" name="_method" value="DELETE">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-success btn-sm">Yes</button>
              </div>
            </div>
          </div>
        </div>
    </form>
script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script type="text/javascript">
   

     $('.multi-select').selectpicker();

$(document).ready(function(){
 
  
  $('#myTable').DataTable();
 

 $('#create_record').click(function(){
  $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
     $('#formModal').modal('show');
 });

  

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('detail.store') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    "dataSrc": "",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
     
     }
     $('#form_result').html(html);
    }
   })
  }

 });


   $('.update-record').on('click',function(){
                var package_id = $(this).data('package_id');

                var package_name = $(this).data('package_name');
                $(".strings").val('');
                $('#UpdateModal').modal('show');
                $('[name="edit_id"]').val(package_id);
                $('[name="package_edit"]').val(package_name);
                //AJAX REQUEST TO GET SELECTED PRODUCT
                $.ajax({
                  url:"{{ route('detail.update') }}",
                    method: "POST",
                    data :{"_token": "{{ csrf_token() }}",
                    package_id:package_id},
                    cache:false,
                    dataType:"json",
                    success : function(data){
                        

                        
                    for(var i=0;i<data.length;i++){



                   //// op+='<option value="'+data[i].prodct_id+'">'+data[i].product_namam+'</option>';

 $(".strings option[value='" + data[i].prodct_id + "']").prop("selected", true).trigger('change');
                            $(".strings").selectpicker('refresh');

                   }

               //    div.find('.strings').html(" ");
               //    div.find('.strings').append(op);

                   
                    }
                      

                
                });
                return false;
            });
    $('.delete-record').on('click',function(){
                var package_id = $(this).data('package_id');
                $('#DeleteModal').modal('show');
                $('[name="delete_id"]').val(package_id);
            });

});
</script>

