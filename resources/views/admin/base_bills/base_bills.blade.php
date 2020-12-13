@extends('admin_temp')
@section('styles')
    <link href="{{ asset('/css/select2.css') }}" rel="stylesheet">
    <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <style>
        #parent {
            /* can be any value */
            width: 300px;
            text-align: right;
            direction: rtl;
            position: relative;
        }
        #parent .select2-container--open + .select2-container--open {
            left: auto;
            right: 0;
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_base_bills')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_base_bills')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <!-- Headings -->
             {{ Form::open( ['url' => ['base_bills'],'method'=>'post'] ) }}
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
                                                  {{ Form::text('bill_num',$bill_num,["class"=>"form-control center" , "required" , "readonly"]) }}
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
                                                <label for="example-text-input" class="col-md-3 col-form-label">{{trans('admin.supplier_name')}}</label>
                                                <div class="col-md-9">
                                                    <div id="parent">
                                                        @if($supplier_sales_selected != null)
                                                            {{ Form::select('supplier_id',App\Models\Supplier::pluck('name','id'),$supplier_sales_selected->supplier_id
                                                              ,["class"=>"select2 form-control custom-select" ,"id"=>"cmb_supplier_id","style"=>"width: 100%; height:36px;",'placeholder'=>trans('admin.choose_supplier') ]) }}
                                                        @else  
                                                            {{ Form::select('supplier_id',App\Models\Supplier::pluck('name','id'),null
                                                              ,["class"=>"select2 form-control custom-select" ,"id"=>"cmb_supplier_id",'placeholder'=>trans('admin.choose_supplier') ]) }}
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
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex no-block">
                                        <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../assets/images/icon/income.png" alt="Income"></div>
                                        <div class="align-self-center">
                                            <h6 class="text-muted m-t-10 m-b-0">{{trans('admin.total')}}</h6>
                                            @if($supplier_sales_selected != null)
                                                <h2 class="m-t-0">{{$supplier_sales_selected->total}}</h2>
                                            @else
                                                <h2 class="m-t-0">0</h2>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex no-block">
                                        <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../assets/images/icon/expense.png" alt="Income"></div>
                                        <div class="align-self-center">
                                            <h6 class="text-muted m-t-10 m-b-0">{{trans('admin.pay')}}</h6>
                                            @if($supplier_sales_selected != null)
                                                <h2 class="m-t-0">{{$supplier_sales_selected->pay}}</h2>
                                            @else
                                                <h2 class="m-t-0">0</h2>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex no-block">
                                        <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../assets/images/icon/assets.png" alt="Income"></div>
                                        <div class="align-self-center">
                                            <h6 class="text-muted m-t-10 m-b-0">{{trans('admin.remain')}}</h6>
                                            @if($supplier_sales_selected != null)
                                                <h2 class="m-t-0">{{$supplier_sales_selected->remain}}</h2>
                                            @else
                                                <h2 class="m-t-0">0</h2>
                                            @endif
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>   
            @if($supplier_sales_selected != null)     
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{trans('admin.base_info')}}</h4>
                            <form method="post" id="select_base_form" enctype="multipart/form-data" class="cmxform">
                                <div id="pay_one" class="form-group row">
                                <!-- <label for="example-url-input" class="col-sm-1 col-form-label">{{trans('admin.installments')}}</label> -->
                                    <input name="supplier_id" id=" txt_supplier_name" value="{{$supplier_sales_selected->supplier_id}}" type="hidden">
                                    <input name="supplier_sale_id" id=" txt_supplier_sale_id" value="{{$supplier_sales_selected->id}}" type="hidden">
                                    <div class="col-sm-4">
                                        {{ Form::select('base_id',App\Models\Base::pluck('name','id'),null
                                        ,["class"=>"select2 form-control custom-select" ,'placeholder'=>trans('admin.choose_base') ]) }}
                                    </div>
                                    <div class="col-sm-3">
                                        <input name="quantity" id=" quantity" class="form-control" type="number"
                                            placeholder="{{trans('admin.quantity')}}" min="1">
                                    </div>
                                    <div class="col-sm-3">
                                        <input name="purchas_price" id=" purchas_price" class="form-control" type="number"
                                            placeholder="{{trans('admin.purchas_price')}}" min="1">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit"  id="add_base" name="add_base" class="btn btn-secondary waves-effect">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <div class="card-block">    
                                <table id="supplier_bases_tbl" class="table full-color-table full-primary-table">
                                    <thead>
                                        <tr>
                                            <th class="center">{{trans('admin.product_name')}}</th>
                                            <th class="center">{{trans('admin.barcode')}}</th>
                                            <th class="center">{{trans('admin.quantity')}}</th>
                                            <th class="center">{{trans('admin.price')}}</th>
                                            <th class="center">{{trans('admin.action')}}</th>
                                        </tr>
                                    </thead>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="../assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script type="text/javascript">
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#supplier_bases_tbl').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('supplier_Bill_Base.index') }}",
                },
                columns: [
                    {
                        data: 'product_name',
                        name: 'product_name',
                        className: 'center'
                    }, {
                        data: 'barcode',
                        name: 'barcode',
                        className: 'center'
                    }, {
                        data: 'quantity',
                        name: 'quantity',
                        className: 'center'
                    }, {
                        data: 'price',
                        name: 'price',
                        className: 'center'
                    },{
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        className: 'center'
                    }
                ]
            });
            $('#select_base_form').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: "{{route('supplier_Bill_Base.store')}}",
                    method: 'post',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {
                    },
                    success: function (data) {
                        // toastr.success(data.success);
                        $("#select_base_form").trigger('reset');
                        $('#supplier_bases_tbl').DataTable().ajax.reload();
                    }, error: function (data_error, exception) {
                    }
                });
            });
            $(function () {
                $('.itemName2').select2({
                    placeholder: 'بحث برقم الهاتف او اسم المورد ',
                    dir: 'rtl',
                    dropdownParent: $('#parent'),
                    ajax: {
                        url: '/select2-autocomplete-ajax',
                        dataType: 'json',
                        delay: 500,
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.name,
                                        id: item.id
                                    }
                                })
                            };
                        },
                        cache: true
                    }
                });
            });
            $(function () {
                $('.itemName').select2({
                    placeholder: 'بحث باسم المنتج الخام او الباركود',
                    dir: 'rtl',
                    dropdownParent: $('#parent'),
                    ajax: {
                        url: '/select2-autocomplete-ajax-base',
                        dataType: 'json',
                        delay: 500,
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.name,
                                        id: item.id
                                    }
                                })
                            };
                        },
                        cache: true
                    }
                });
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function(markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                templateResult: formatRepo, // omitted for brevity, see the source of this page
                templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });  
    </script>
  
@endsection

