@include('Admin.assets.header')
@include('Admin.assets.nav')
@include('Admin.assets.sidnav')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 163px;">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <h1 class="mt-4">Edit links</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard/contact/Edit</li>
                @if($errors->any())
                <div >
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </ol>


            <div class="card mb-4">

                <div class="card-body">

                    <form method="post" action="{{route('admin.links.update')}}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="links_id" value="{{$links->id}}">
                        <div class="form-group">
                            <label for="exampleInputName">Address</label>
                            <input type="text" class="form-control" id="exampleInputName" name="address" aria-describedby="" placeholder="Enter Title" value="{{$links->Address}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">phone</label>
                            <input type="text" class="form-control" id="exampleInputName" name="phone" aria-describedby="" placeholder="Enter Title" value="{{$links->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Email</label>
                            <input type="text" class="form-control" id="exampleInputName" name="email" aria-describedby="" placeholder="Enter Title" value="{{$links->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">facebook</label>
                            <input type="text" class="form-control" id="exampleInputName" name="facebook" aria-describedby="" placeholder="Enter Title" value="{{$links->facebook}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">twitter</label>
                            <input type="text" class="form-control" id="exampleInputName" name="twitter" aria-describedby="" placeholder="Enter Title" value="{{$links->twitter}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">instegram</label>
                            <input type="text" class="form-control" id="exampleInputName" name="instegram" aria-describedby="" placeholder="Enter Title" value="{{$links->instegram}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">googlemaps</label>
                            <input type="text" class="form-control" id="exampleInputName" name="googlemaps" aria-describedby="" placeholder="Enter Title" value="{{$links->googlemaps}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@include('Admin.assets.footer')