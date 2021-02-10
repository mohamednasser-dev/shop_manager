    <aside class="left-sidebar">
            <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('home')}}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">{{trans('admin.nav_home')}}</span></a>
                    </li>
                    <li>
                        @if(Gate::check('buy part') || Gate::check('buy gomla')|| Gate::check('buy back'))
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">{{trans('admin.nav_buy')}}</span></a>
                        @endif
                        <ul aria-expanded="false" class="collapse">
                            @can('buy part')
                                <li><a href="{{url('buy/part')}}">{{trans('admin.nav_buy_part')}}</a></li>
                            @endcan
                            @can('buy gomla')
                                <li><a href="{{url('buy/gomla')}}">{{trans('admin.nav_buy_gomla')}}</a></li>
                            @endcan
                            @can('buy back')
                                <!-- <li><a href="{{url('buy/back')}}">{{trans('admin.nav_buy_back')}}</a></li> -->
                            @endcan
                        </ul>
                    </li>
                    @can('categories')
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('categories')}}" aria-expanded="false"><i class="mdi mdi-animation"></i><span class="hide-menu">{{trans('admin.categories')}}</span></a>
                        </li>
                    @endcan
                    @can('products')
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('products')}}" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">{{trans('admin.nav_products')}}</span>
                            </a>
                        </li>
                    @endcan

                    <li>
                        @if(Gate::check('bases') || Gate::check('add base bill'))
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-scale"></i><span class="hide-menu">{{trans('admin.nav_bases')}}</span></a>
                        @endif
                        <ul aria-expanded="false" class="collapse">
                            @can('bases')
                                <li><a href="{{url('bases')}}">{{trans('admin.view_bases')}}</a></li>
                            @endcan
                            @can('add base bill')
                                <li><a href="{{url('base_bills')}}">{{trans('admin.nav_base_bills')}}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @can('customers')
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('customer')}}" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">{{trans('admin.nav_customers')}}</span></a>
                        </li>
                    @endcan
                    @can('suppliers')
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('supplier')}}" aria-expanded="false"><i class="mdi mdi-account-star-variant"></i><span class="hide-menu">{{trans('admin.nav_suppliers')}}</span></a>
                        </li>
                    @endcan
                    <li>
                        @if(Gate::check('employees') || Gate::check('permissions'))
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.nav_users')}}</span></a>
                        @endif
                        <ul aria-expanded="false" class="collapse">
                            @can('employees')
                                <li><a href="{{url('users')}}">{{trans('admin.view_users')}}</a></li>
                            @endcan
                            @can('permissions')
                                <li><a href="{{url('roles')}} ">{{trans('admin.nav_permissions')}}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @can('Account statement')
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('accounts')}}" aria-expanded="false"><i class="fa fa-file-code-o"></i><span class="hide-menu">{{trans('admin.nav_account_list')}}</span></a>
                        </li>
                    @endcan
                    @can('bills')
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('buy-bills')}}" aria-expanded="false"><i class="mdi mdi-file-find"></i><span class="hide-menu">{{trans('admin.nav_bills')}}</span></a>
                        </li>
                    @endcan
                    @can('income')
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('income')}}" aria-expanded="false"><i class="mdi mdi-pin"></i><span class="hide-menu">{{trans('admin.nav_income')}}</span></a>
                        </li>
                    @endcan
                    @can('outgoings')
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('outgoing')}}" aria-expanded="false"><i class="mdi mdi-square-inc-cash"></i><span class="hide-menu">{{trans('admin.nav_outgoing')}}</span></a>
                        </li>

                    @endcan
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('inbox')}}" aria-expanded="false"><i class="fa fa-inbox"></i><span class="hide-menu">{{trans('admin.inbox')}}</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('orders')}}" aria-expanded="false"><i class="fa fa-file"></i><span class="hide-menu">{{trans('admin.orders')}}</span></a>
                    </li>
                    @can('Lock a fiscal year')
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('finatial_year')}}" aria-expanded="false"><i class="mdi mdi-cake-variant"></i><span class="hide-menu">{{trans('admin.nav_close_year')}}</span></a>
                        </li>
                    @endcan
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <div class="page-wrapper">
        @include('layouts.errors')
        @include('layouts.messages')
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
