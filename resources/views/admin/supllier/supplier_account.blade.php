@extends('admin_temp')
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
                <div class="col-sm-12 col-md-8">
                    <div class="card col-md-12">
                        <div class="card-body" style="height: 85px;">
                            <div class="card-block" style="margin-top: -40px;">
                                <!-- This form to add new news row in database -->
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.supplier_name')}}</label>
                                    <div class="col-md-10">
                                      {{ Form::text('name',null,["class"=>"form-control" ,"required"]) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <div class="col-sm-12 col-md-4">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <div class="card-block">
                                <div class="row col-md-12" >
                                    <div>
                                        <label>{{trans('admin.money')}}</label>
                                        {!! Form::text('money','1',['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="row col-md-12" >
                                    <div>
                                        <label>{{trans('admin.notes')}}</label>
                                        {!! Form::text('total','1000',['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row col-md-12" >
                                    <button type="button" class="btn btn-rounded btn-block btn-success">{{trans('admin.pay_it')}}</button>
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
                                <table id="myTable" class="table full-color-table full-primary-table">
                                    <thead>
                                        <tr>
                                            <th class="text-lg-center">{{trans('admin.bill_num')}}</th>
                                            <th class="text-lg-center">{{trans('admin.total')}}</th>
                                            <th class="text-lg-center">{{trans('admin.pay')}}</th>
                                            <th class="text-lg-center">{{trans('admin.remain')}}</th>
                                            <th class="text-lg-center">{{trans('admin.date')}}</th>
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

