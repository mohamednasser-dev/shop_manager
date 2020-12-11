@extends('admin_temp')
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
            @include('layouts.errors')
            @include('layouts.messages')
            <!-- Headings -->
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-9">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                     <!-- This form to add new news row in database -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                     <!-- This form to add new news row in database -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{trans('admin.choose_target')}}</h5>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection

