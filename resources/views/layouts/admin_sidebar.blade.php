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
                        <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">{{trans('admin.nav_buy')}}</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('buy/part')}}">{{trans('admin.nav_buy_part')}}</a></li>
                            <li><a href="{{url('buy/gomla')}}">{{trans('admin.nav_buy_gomla')}}</a></li>
                            <li><a href="{{url('buy/back')}}">{{trans('admin.nav_buy_back')}}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('categories')}}" aria-expanded="false"><i class="mdi mdi-animation"></i><span class="hide-menu">{{trans('admin.categories')}}</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('products')}}" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">{{trans('admin.nav_products')}}</span></a>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-scale"></i><span class="hide-menu">{{trans('admin.nav_bases')}}</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('bases')}}">{{trans('admin.view_bases')}}</a></li>
                            <li><a href="{{url('base_bills')}}">{{trans('admin.nav_base_bills')}}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('customer')}}" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">{{trans('admin.nav_customers')}}</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('supplier')}}" aria-expanded="false"><i class="mdi mdi-account-star-variant"></i><span class="hide-menu">{{trans('admin.nav_suppliers')}}</span></a>
                    </li>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.nav_users')}}</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('users')}}">{{trans('admin.view_users')}}</a></li>
                            <li><a href="{{url('users/create')}} ">{{trans('admin.add_new_user')}}</a></li>
                            <li><a href="{{url('roles')}} ">{{trans('admin.nav_permissions')}}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('buy-bills')}}" aria-expanded="false"><i class="mdi mdi-file-find"></i><span class="hide-menu">{{trans('admin.nav_bills')}}</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('income')}}" aria-expanded="false"><i class="mdi mdi-pin"></i><span class="hide-menu">{{trans('admin.nav_income')}}</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('outgoing')}}" aria-expanded="false"><i class="mdi mdi-square-inc-cash"></i><span class="hide-menu">{{trans('admin.nav_outgoing')}}</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('finatial_year')}}" aria-expanded="false"><i class="mdi mdi-cake-variant"></i><span class="hide-menu">{{trans('admin.nav_close_year')}}</span></a>
                    </li>
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
