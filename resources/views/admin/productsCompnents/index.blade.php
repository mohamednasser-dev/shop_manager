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
            <h3 class="text-themecolor">{{trans('admin.products')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.products')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}">{{trans('admin.nav_home')}}</a></li>
            </ol>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('products/create')}}"
                            class="btn btn-info btn-bg">
                        {{trans('admin.add_product')}}
                    </a>

                </div>
                <div class="card-body">
                    <!-- Start home table -->
                    <table id="table-8344"
                           class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle">
                        <thead>
                        <tr>
                            <th class="text-center">{{trans('admin.name')}}</th>
                            <th class="text-center">{{trans('admin.barcode')}}</th>
                            <th class="text-center">{{trans('admin.quantity')}}</th>
                            <th class="text-center">{{trans('admin.alarm_quantity')}}</th>
                            <th class="text-center">{{trans('admin.total_cost')}}</th>
                            <th class="text-center">{{trans('admin.gomla_percent')}}</th>
                            <th class="text-center">{{trans('admin.part_percent')}}</th>
                            <th class="text-center">{{trans('admin.category')}}</th>
                            <th class="text-center">{{trans('admin.actions')}}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($products as $user)
                            <tr>
                                <td class="text-center">{{$user->name}}</td>
                                <td class="text-center">{{$user->barcode}}</td>
                                <td class="text-center">{{$user->quantity}}</td>
                                <td class="text-center">{{$user->alarm_quantity}}</td>
                                <td class="text-center">{{$user->total_cost}}</td>
                                <td class="text-center">{{$user->gomla_percent}}</td>
                                <td class="text-center">{{$user->part_percent}}</td>
                                <td class="text-center">{{$user->category->name}}</td>


                                <td class="text-lg-center">
                                    <a class='btn btn-raised btn-success btn-sml'
                                       href=" {{url('products/'.$user->id.'/edit')}}"
                                       data-editid="{{$user->id}}" id="edit"><i class="fa fa-edit"></i></a>

                                    <form method="get" id='delete-form-{{ $user->id }}'
                                          action="{{url('products/'.$user->id.'/delete')}}"
                                          style='display: none;'>
                                    {{csrf_field()}}
                                    <!-- {{method_field('delete')}} -->
                                    </form>
                                    <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                                        {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{ $user->id }}').submit();
                                        }else {
                                        event.preventDefault();
                                        }"
                                            class='btn btn-danger btn-circle' href=" "><i
                                            class="fa fa-trash" aria-hidden='true'>
                                        </i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                {{$products->links()}}



                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')


    <script>
        var id;
        $(document).on('click', '#edit', function() {
            id = $(this).data('editid');
            console.log(id);
            $.ajax({
                url: "bases/" + id,
                dataType: "json",
                success: function(html) {
                    $('#id').val(html.data.id);
                    $('#name').val(html.data.name);
                    $('#category_id').val(html.data.category_id);
                    $('#quantity').val(html.data.quantity);
                    $('#alarm_quantity').val(html.data.alarm_quantity);
                    $('#price').val(html.data.price);
                    $('#purchas_price').val(html.data.purchas_price);
                    $('#barcode').val(html.data.barcode);
                    $('#measur_unit').val(html.data.measur_unit);



                }
            })
        });



    </script>

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

