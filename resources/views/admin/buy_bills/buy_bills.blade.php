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
            <h3 class="text-themecolor">{{trans('admin.nav_bills')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_bills')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">   
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{trans('admin.Search_area')}}</h4>
                            <div class="row">
                                <div class="col-md-3">
                                    <div>
                                        <label>{{trans('admin.search_by_bill_num')}}</label>
                                        {!! Form::text('bill_num','',['class'=>'form-control center']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <label>{{trans('admin.search_by_date')}}</label>
                                        {!! Form::date('date',$today,['class'=>'form-control center']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label>{{trans('admin.search_by_cust_name')}}</label>
                                        {{ Form::select('cust_id',App\Models\Customer::pluck('name','id'),null
                                        ,["class"=>"select2 form-control custom-select" ,'placeholder'=>trans('admin.choose_cust') ]) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <div class="card-block">    
                                <table id="supplier_bases_tbl" class="table full-color-table full-primary-table">
                                    <thead>
                                        <tr>
                                            <th class="center">{{trans('admin.bill_num')}}</th>
                                            <th class="center">{{trans('admin.total')}}</th>
                                            <th class="center">{{trans('admin.pay')}}</th>
                                            <th class="center">{{trans('admin.remain')}}</th>
                                            <th class="center">{{trans('admin.date')}}</th>
                                            <th class="center">{{trans('admin.actions')}}</th>
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

