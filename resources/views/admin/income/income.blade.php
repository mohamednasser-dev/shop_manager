@extends('admin_temp')
@section('styles')
    <link href="{{ asset('/css/pages/tab-page.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_income')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_income')}}</li>
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
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="custom-control custom-radio">
                                            <input id="radio4" name="radio" type="radio" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                            <span>{{trans('admin.daily')}}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-9">
                                        <div class="radio-list">
                                            <label class="custom-control custom-radio">
                                                <input id="radio4" name="radio" type="radio" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span>{{trans('admin.monthly')}}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="custom-control custom-radio">
                                        <input id="radio3" name="radio" type="radio" checked="" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span>{{trans('admin.yearly')}}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div>
                                        {!! Form::date('date',$today,['class'=>'form-control center']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <select id="month" name="month" class="select2 form-control custom-select">
                                            <option value="01" selected="selected">1</option>
                                            <option value="02">2</option>
                                            <option value="03">3</option>
                                            <option value="04">4</option>
                                            <option value="05">5</option>
                                            <option value="06">6</option>
                                            <option value="07">7</option>
                                            <option value="08">8</option>
                                            <option value="09">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <select id="year" name="year" class="select2 form-control custom-select">
                                            <option value="2020" selected="selected">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                            <option value="2032">2032</option>
                                            <option value="2033">2033</option>
                                            <option value="2034">2034</option>
                                            <option value="2035">2035</option>
                                            <option value="2036">2036</option>
                                            <option value="2037">2037</option>
                                            <option value="2038">2038</option>
                                            <option value="2039">2039</option>
                                            <option value="2040">2040</option>
                                            <option value="2041">2041</option>
                                            <option value="2042">2042</option>
                                            <option value="2043">2043</option>
                                        </select>
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
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block">
                                <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="{{ asset('assets/images/icon/total2.png') }}" alt="Income"></div>
                                <div class="align-self-center">
                                    <h6 class="text-muted m-t-10 m-b-0">{{trans('admin.nav_buy')}}</h6>
                                    <h2 class="m-t-0">{{$total_pay}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block">
                                <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="{{ asset('assets/images/icon/payed.png') }}" alt="Income"></div>
                                <div class="align-self-center">
                                    <h6 class="text-muted m-t-10 m-b-0">{{trans('admin.nav_outgoing')}}</h6>
                                    <h2 class="m-t-0">{{$total_outgoing}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block">
                                <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="{{ asset('assets/images/icon/remain.png') }}" alt="Income"></div>
                                <div class="align-self-center">
                                    <h6 class="text-muted m-t-10 m-b-0">{{trans('admin.suppliers_accounts')}}</h6>
                                    <h2 class="m-t-0">{{$total_supplierPayment}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block">
                                <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="{{ asset('assets/images/icon/expense.png') }}" alt="Income"></div>
                                <div class="align-self-center">
                                    <h6 class="text-muted m-t-10 m-b-0">{{trans('admin.final_safy')}}</h6>
                                    <h2 class="m-t-0">{{$remain}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home8" role="tab"><span>{{trans('admin.nav_buy')}}<i class="ti-shopping-cart"></i></span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile8" role="tab"><span>{{trans('admin.nav_outgoing')}}<i class="ti-money"></i></span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages8" role="tab"><span>{{trans('admin.suppliers_accounts')}}<i class="ti-user"></i></span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home8" role="tabpanel">
                                    <table id="supplier_bases_tbl" class="table full-color-table full-primary-table">
                                        <thead>
                                            <tr>
                                                <th class="center">{{trans('admin.bill_num')}}</th>
                                                <th class="center">{{trans('admin.customer')}}</th>
                                                <th class="center">{{trans('admin.total')}}</th>
                                                <th class="center">{{trans('admin.pay')}}</th>
                                                <th class="center">{{trans('admin.remain')}}</th>
                                                <th class="center">{{trans('admin.date')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customer_bills as $user)
                                                <tr>
                                                    <td class="text-lg-center">{{$user->bill_num}}</td>
                                                    <td class="text-lg-center">{{$user->Customer->name}}</td>
                                                    <td class="text-lg-center">{{$user->total}}</td>
                                                    <td class="text-lg-center">{{$user->pay}}</td>
                                                    <td class="text-lg-center">{{$user->remain}}</td>
                                                    <td class="text-lg-center">{{$user->date}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$customer_bills->links()}}
                                </div>
                                <div class="tab-pane  p-20" id="profile8" role="tabpanel">
                                    <table id="myTable" class="table full-color-table full-primary-table">
                                        <thead>
                                            <tr>
                                                <th class="text-lg-center">{{trans('admin.name')}}</th>
                                                <th class="text-lg-center">{{trans('admin.cost')}}</th>
                                                <th class="text-lg-center">{{trans('admin.date')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($outgoings as $user)
                                            <tr>
                                                <td class="text-lg-center">{{$user->name}}</td>
                                                <td class="text-lg-center">{{$user->cost}}</td>
                                                <td class="text-lg-center">{{$user->date}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                {{$outgoings->links()}}
                                </div>
                                <div class="tab-pane p-20" id="messages8" role="tabpanel">
                                    <table id="myTable" class="table full-color-table full-primary-table">
                                        <thead>
                                            <tr>
                                                <th class="text-lg-center">{{trans('admin.bill_num')}}</th>
                                                <th class="text-lg-center">{{trans('admin.supplier_name')}}</th>
                                                <th class="text-lg-center">{{trans('admin.money')}}</th>
                                                <th class="text-lg-center">{{trans('admin.date')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($supplierPayments as $user)
                                            <tr>
                                                <td class="text-lg-center">{{$user->bill_id}}</td>
                                                <td class="text-lg-center">{{$user->Supplier->name}}</td>
                                                <td class="text-lg-center">{{$user->money}}</td>
                                                <td class="text-lg-center">{{$user->created_at->format('Y-m-d')}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$supplierPayments->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

