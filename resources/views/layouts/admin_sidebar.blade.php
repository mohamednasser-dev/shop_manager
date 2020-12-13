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
                        <a class="waves-effect waves-dark" href="{{url('buy')}}" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.nav_buy')}}</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('categories')}}" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.categories')}}</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.nav_products')}}</span></a>
                    <li> 
                        <a class="has-arrow waves-effect waves-dark" href="" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.nav_bases')}}</span></a>    
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('bases')}}">{{trans('admin.view_bases')}}</a></li>
                            <li><a href="{{url('base_bills')}}">{{trans('admin.nav_base_bills')}}</a></li>
                        </ul>  
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.nav_customers')}}</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('supplier')}}" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.nav_suppliers')}}</span></a>
                    </li>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="{{url('users')}}" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.nav_users')}}</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('users')}}">{{trans('admin.view_users')}}</a></li>
                            <li><a href="{{url('users/create')}} ">{{trans('admin.add_new_user')}}</a></li>
                            <li><a href="{{url('roles')}} ">{{trans('admin.nav_permissions')}}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{url('buy_bills')}}" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.nav_bills')}}</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.nav_income')}}</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.nav_outgoing')}}</span></a>
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
