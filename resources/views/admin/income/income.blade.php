@extends('admin_temp')
@section('styles')
    <link href="{{ asset('/css/select2.css') }}" rel="stylesheet">
    {{--    <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />--}}
@endsection
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_bills')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_bills')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}">{{trans('admin.nav_home')}}</a></li>
            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{trans('admin.Search_area')}}</h4>
                            <div class="row">
                                <div>
                                    {{ Form::open( ['url'  => ['buy-bills'],'method'=>'post' ] ) }}
                                    {{ csrf_field() }}
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label>{{trans('admin.search_by_bill_num')}}</label>
                                        {!! Form::number('bill_num','',['class'=>'form-control center']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label>{{trans('admin.search_by_date')}}</label>
                                        {!! Form::date('date',old('date'),['class'=>'form-control center']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label>{{trans('admin.search_by_cust_name')}}</label>
                                        {{ Form::select('cust_id',App\Models\Customer::pluck('name','id'),null
                                        ,["class"=>"select2 form-control custom-select" ,'placeholder'=>trans('admin.choose_cust') ]) }}
                                    </div>
                                </div>
                                <div class="col-md-12" style="display: block; margin-top: 20px;" >
                                    {{ Form::submit( trans('admin.search') ,['class'=>'btn btn-info btn-block']) }}
                                    {{ Form::close() }}
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
                            <h4 class="card-title">Customtab vertical Tab</h4>
                            <h6 class="card-subtitle">Use default tab with class <code>vtabs, tabs-vertical & customvtab</code></h6>
                            <!-- Nav tabs -->
                            <div class="vtabs ">
                                <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home9" role="tab"><span><i class="ti-home"></i></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile9" role="tab"><span><i class="ti-user"></i></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages9" role="tab"><span><i class="ti-email"></i></span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home9" role="tabpanel">
                                        <div class="p-20">
                                            <h3>Best Clean Tab ever</h3>
                                            <h4>you can use it with the small code</h4>
                                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20" id="profile9" role="tabpanel">2</div>
                                    <div class="tab-pane p-20" id="messages9" role="tabpanel">3</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

