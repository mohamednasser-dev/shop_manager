@extends('admin_temp')
@section('style')
    <link href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('css/colors/default-dark.css')}}" id="theme" rel="stylesheet">

@endsection
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.edit_role')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.edit_role')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('roles')}}">{{trans('admin.nav_permissions')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}">{{trans('admin.nav_home')}}</a></li>
            </ol>
        </div>
    </div>
    <!-- /.card-header -->
    <form action="{{ route('roles.update_permission', $role->id) }}" method="POST">
        <div class="row">
            @csrf
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label" for="name">{{trans('admin.role_name')}}</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="{{trans('admin.name')}}" id="name" name="name" class="form-control" value="{{ $role->name }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h5 class="m-b-0 text-white">{{trans('admin.nav_permissions')}}</h5>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-from-label" for="banner"></label>
                            <div class="col-md-8">
                                @foreach($permissions as $permission)
                                <div class="row">
                                    <div class="col-md-10">
                                        <label class="col-from-label">{{ $permission->name }}</label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="switch">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="{{$permission->name}}" @php if(in_array($permission->id , $r_permissions)) echo "checked"; @endphp>
                                                <span class="lever switch-col-indigo"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                           </div>  
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{trans('admin.public_Save')}}</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{ asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js')}}'"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endsection

