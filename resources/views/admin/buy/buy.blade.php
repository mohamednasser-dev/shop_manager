@extends('admin_temp')
@section('styles')
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
   <!--  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
@endsection
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_buy')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_buy')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
        <!-- /.card-header -->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <!-- Headings -->
            {{ Form::open( ['url' => ['cust_bills'],'method'=>'post'] ) }}
                {{ csrf_field() }}
                <section id="html-headings-default" class="row match-height">
                    <div class="col-sm-12 col-md-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body" style="height: 85px;">
                                        <div class="card-block" style="margin-top: -40px;">
                                            <!-- This form to add new news row in database -->
                                            <div class="form-group m-t-40 row">
                                                <label for="example-text-input" class="col-md-3 col-form-label">{{trans('admin.bill_num')}}</label>
                                                <div class="col-md-3">
                                                  {{ Form::text('bill_num',$bill_num,["class"=>"form-control center" , "id" => "txt_bill_num", "required" , "readonly"]) }}
                                                </div>
                                                <div class="col-md-4">
                                                  <button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">{{trans('admin.open_new_bill')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-lg-6">   
                                <div class="card">
                                    <div class="card-body" style="height: 85px;">
                                        <div class="card-block" style="margin-top: -40px;">
                                            <!-- This form to add new news row in database -->
                                            <div class="form-group m-t-40 row">
                                                <label for="example-text-input" class="col-md-3 col-form-label">{{trans('admin.cust_name')}}</label>
                                                <div class="col-md-9">
                                                    <div id="parent">
                                                        @if($customer_bills_selected != null)
                                                            {{ Form::select('cust_id',App\Models\Customer::pluck('name','id'),$customer_bills_selected->cust_id
                                                              ,["class"=>"select2 form-control custom-select" ,"id"=>"cmb_cust_id","style"=>"width: 100%; height:36px;",'placeholder'=>trans('admin.choose_cust') ]) }}
                                                        @else  
                                                            {{ Form::select('cust_id',App\Models\Customer::pluck('name','id'),null
                                                              ,["class"=>"select2 form-control custom-select" ,"id"=>"cmb_cust_id",'placeholder'=>trans('admin.choose_cust') ]) }}
                                                        @endif     
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            {{ Form::close() }}
            @if($customer_bills_selected != null)
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-9">
                    <div class="card col-md-12">
                        <div class="card-body">
                            <div class="card-block">
                                 <!-- This form to add new news row in database -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <label>{{trans('admin.search_by_product_barcode_name')}}</label>
                                            {!! Form::text('name',null,['class'=>'form-control center','id' => 'search_product']) !!}
                                        </div>
                                    </div>
                                </div>  
                                <div class="row">
                                    <h3 align="center">{{trans('admin.total_data')}}<span id="total_records"></span></h3>
                                    <table id="search_table" class="table color-table warning-table">
                                        <thead>
                                            <tr>
                                                <th class="text-lg-center">{{trans('admin.product_name')}}</th>
                                                <th class="text-lg-center">{{trans('admin.barcode')}}</th>
                                                <th class="text-lg-center">{{trans('admin.quantity')}}</th>
                                                <th class="text-lg-center">{{trans('admin.price')}}</th>
                                                <th class="text-lg-center">{{trans('admin.sale')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                     
                                        </tbody>
                                    </table> 
                                </div>      
                            </div>
                        </div>
                    </div>
                                 <!-- This form to add new news row in database -->
                    <div class="card col-md-12">
                        <div class="card-body">
                            <div class="card-block">
                                <h4 align="center">{{trans('admin.bill_procusts')}}</h4>
                                <!-- here ......................................   -->
                                <table id="bill_product_tbl" class="table full-color-table full-primary-table">
                                    <thead>
                                        <tr>
                                            <th class="text-lg-center">{{trans('admin.product_name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.barcode')}}</th>
                                            <th class="text-lg-center">{{trans('admin.quantity')}}</th>
                                            <th class="text-lg-center">{{trans('admin.price')}}</th>
                                            <th class="text-lg-center">{{trans('admin.total')}}</th>
                                            <th class="text-lg-center">{{trans('admin.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customer_bills_products as $product)
                                        <tr>
                                            <td class="text-lg-center">{{$product->name}}</td>
                                            <td class="text-lg-center">{{$product->Product->barcode}}</td>
                                            <td class="text-lg-center">{{$product->quantity}}</td>
                                            <td class="text-lg-center">{{$product->price}}</td>
                                            <td class="text-lg-center">{{$product->total}}</td>
                                            <td class="text-lg-center">
                                                <form method="get" id='delete-form-{{ $product->id }}'
                                                    action="{{url('buy/'.$product->id.'/delete')}}"
                                                    style='display: none;'>
                                                    {{csrf_field()}}
                                                    <!-- {{method_field('delete')}} -->
                                                </form>
                                                <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                                                    {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $product->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }"
                                                        class='btn btn-danger btn-circle' href=" ">
                                                        <i class="fa fa-trash" aria-hidden='true'></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <div class="card-block">
                                <div class="row col-md-12" >
                                    <div>
                                        <label align="center">{{trans('admin.sale_total')}}{{$customer_bills_selected->total}}</label>
                                    </div>
                                </div>
                                <div class="row col-md-12" >
                                    <label class="col-md-7 col-form-label">{{trans('admin.sale_pay')}}</label>
                                    <div class="col-md-5">
                                        {!! Form::text('pay',$customer_bills_selected->pay,['class'=>'form-control center']) !!}
                                    </div>
                                </div>    
                                <div class="row col-md-12" >
                                    <div>
                                        <label align="center">{{trans('admin.sale_remain')}}{{$customer_bills_selected->remain}}</label>
                                    </div>
                                </div>
                                <br>
                                <div class="row col-md-12" >
                                    {{ Form::open( ['url' => ['buy_bill_design/'.$customer_bills_selected->id.'/print'],'method'=>'get'] ) }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-rounded btn-block btn-success">
                                            <i class="fa fa-print"></i>
                                        {{trans('admin.print')}}</button>
                                    {{ Form::close() }}    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
        </div>
    </div>
    <!-- /.modal -->
    @if($customer_bills_selected != null)
        {{--edit  modal --}}
        <div id="sale-modal" class="modal fade" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{trans('admin.add_sale')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                    </div>
                    {{ Form::open( ['method'=>'post' , 'id'=>'sale_form'] ) }}
                    {{ csrf_field() }}
                        <div class="modal-body">
                            <span id="form_output"></span>
                            {{ Form::hidden('product_id',null,["class"=>"form-control" ,"required",'id'=>'txt_product_id']) }}
                            {{ Form::hidden('bill_id',$customer_bills_selected->id ,["class"=>"form-control" ,"required",'id'=>'txt_bill_id']) }}
                            <div class="form-group">
                                <label for="recipient-name"
                                    class="control-label">{{trans('admin.quantity')}}</label>
                                {{ Form::number('quantity',null,["class"=>"form-control" ,"required",'id'=>'txt_quantity','min'=>'1']) }}
                            </div>
                            <div class="form-group">
                                <label for="recipient-name"
                                       class="control-label">{{trans('admin.price')}}</label>
                                {{ Form::number('price',null,["class"=>"form-control" ,"required",'id'=>'txt_price','min'=>'1']) }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                                {{trans('admin.close')}}
                            </button>
                            <input type="hidden" name="button_action" id="button_action" value="insert" />
                            {{ Form::submit( trans('admin.sale') ,['class'=>'btn btn-info','style'=>'margin:10px']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    @endif

@endsection
@section('scripts')
    @if($customer_bills_selected != null)
    <script>
        $(document).ready(function(){
            fetch_product_data();
            function fetch_product_data(query = ''){
                $.ajax({
                    url:"{{ route('live_search.products') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data){
                        $('#search_table tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }
            $(document).on('keyup', '#search_product', function(){
                var query = $(this).val();
                fetch_product_data(query);
            });
            var product_id;
            var quantity;
            var selected_Date;
            var selected_price;
            $(document).on('click', '#sale_btn', function() {

                product_id = $(this).data('product-id');
                selected_price = $(this).data('price');
                quantity = $(this).data('quantity');

                $("#txt_product_id").val(product_id);
                $("#txt_price").val(selected_price);
                $('#txt_quantity').attr('max', quantity);

                $.ajax({
                    url: "supplier/" + id,
                    dataType: "json",
                    success: function(html) {
                        $('#id').val(html.data.id);
                        $('#name').val(html.data.name);
                        $('#phone').val(html.data.phone);
                        $('#address').val(html.data.address);
                    }
                })
            });
            $('#bill_product_tbl').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('ajaxdata.get_bill_product_data',['bill_id' => $customer_bills_selected->id]) }}",
                "columns":[
                    { "data": " name" },
                    { "data": "barcode" },
                    { "data": "quantity" },
                    { "data": "price" },
                    { "data": "total" }
                ]
             });
            $('#sale_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url:"{{ route('buy.store') }}",
                    method:"POST",
                    data:form_data,
                    dataType:"json",
                    success:function(data){
                        if(data.error.length > 0){
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                            }
                            $('#form_output').html(error_html);
                        }else{
                            alert(0);
                            // $('#form_output').html(data.success);
                            // $('#sale_form')[0].reset();
                            // $('#action').val(trans('admin.sale'));
                            // $('.modal-title').text(trans('admin.edit_base'));
                            // $('#button_action').val('insert');
                            // $('#bill_product_tbl').DataTable().ajax.reload();
                            $.ajax({
                                type: "POST",
                                url: "{{url('/')}}/select_products",
                                data: { 
                                    id:"{{$customer_bills_selected->id}}",
                                    access_token: $("#access_token").val() 
                                },
                                success: function(result) {
                                    alert('ok');
                                },
                                error: function(result) {
                                    alert('error');
                                }
                            });

                           

                        }
                    }
                })
            });
        });

     

 
    </script>
    @endif
@endsection

