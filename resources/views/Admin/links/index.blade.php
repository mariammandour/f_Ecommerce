@include('Admin.assets.header')
@include('Admin.assets.nav')
@include('Admin.assets.sidnav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 163px;">

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard/contact/display</li>
                </ol>
                <div class="card mb-4">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Address</th>
                                        <th>phone</th>
                                        <th>email</th>
                                        <th>facebook</th>
                                        <th>twitter</th>
                                        <th>instegram</th>
                                        <th>Google map</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Address</th>
                                        <th>phone</th>
                                        <th>Email</th>
                                        <th>facebook</th>
                                        <th>twitter</th>
                                        <th>instegram</th>
                                        <th>Google map</th>
                                        <th>Action</th>
                                </tfoot>
                                <tbody>
                                @foreach($links as $key => $link)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$link->Address}}</td>
                                            <td>{{$link->phone}}</td>
                                            <td>{{$link->email}}</td>
                                            <td><a href="{{$link->Address}}">facebook</a></td>
                                            <td><a href="{{$link->twitter}}">twitter</a></td>
                                            <td><a href="{{$link->instegram}}">instegram</a></td>
                                            <td><a href="{{$link->googlemaps}}">Google map</a></td>
                                            <td> <a href="{{route('admin.links.edit', [$link->id])}}" class='btn btn-primary m-r-1em'>Edit</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@include('Admin.assets.footer')