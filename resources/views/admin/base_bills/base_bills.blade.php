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
            @include('layouts.errors')
            @include('layouts.messages')
            <!-- Headings -->
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
                                              {{ Form::text('bill_num',null,["class"=>"form-control" ,"required"]) }}
                                            </div>
                                            <div class="col-md-4">
                                              <button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-primary">{{trans('admin.open_new_bill')}}</button>
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
                                                <div class="col-sm-9" id="parent">
                                                    <select  class="itemName2 custom-select col-10" style="text-align-last: right;"
                                                            name="supplier_id">
                                                    </select>
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
                                            <h2 class="m-t-0">953,000</h2></div>
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
                                            <h2 class="m-t-0">236,000</h2></div>
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
                                            <h2 class="m-t-0">987,563</h2></div>
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
                            <div class="card-body">
                                <h4 class="card-title">Different Widths</h4>
                                <h6 class="card-subtitle">Just add <code>col*</code> class to form-group</h6>
                                <form class="form-material m-t-40 row">
                                    <div class="form-group col-md-4 m-t-20" id="parent">
                                        <select  class="itemName custom-select col-10" style="text-align-last: right;"
                                                name="base_id">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 m-t-20">
                                        <input type="email" id="example-email2" name="example-email" class="form-control" placeholder="col-md-4"> 
                                    </div>
                                    <div class="form-group col-md-4 m-t-20">
                                        <input type="text" class="form-control" value="col-md-4"> </div>
                                </form>
                            </div>
                        </div>
                </div>
            </section>
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <div class="card-block">    
                                <table id="myTable" class="table full-color-table full-primary-table">
                                    <thead>
                                        <tr>
                                            <th class="text-lg-center">{{trans('admin.product_name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.barcode')}}</th>
                                            <th class="text-lg-center">{{trans('admin.quantity')}}</th>
                                            <th class="text-lg-center">{{trans('admin.price')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                 
                                    </tbody>
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
    </script>
  
@endsection

