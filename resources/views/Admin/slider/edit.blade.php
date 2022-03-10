@include('Admin.assets.header')
@include('Admin.assets.nav')
@include('Admin.assets.sidnav')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 163px;">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <h1 class="mt-4">Edit slider</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard/slider/Edit</li>
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

                    <form method="post" action="{{route('admin.slider.update')}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="slider_id" value="{{$slider->id}}">
                        <div class="form-group">
                            <label for="exampleInputName">Image</label><br>
                            <input type="file" class="" id="exampleInputName" 
                            name="image" aria-describedby="" placeholder="Enter Title">
                        </div>
                        <td><img width="100px" height="100px" src="{{asset('images/slider/'.$slider->image)}}"></td><br>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
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