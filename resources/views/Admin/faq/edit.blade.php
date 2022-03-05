@include('Admin.assets.header')
@include('Admin.assets.nav')
@include('Admin.assets.sidnav')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 163px;">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <h1 class="mt-4">Add faq</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard/faq/Edit</li>
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

                    <form method="post" action="{{route('admin.faq.update')}}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="faq_id" value="{{$faq->id}}">
                        <div class="form-group">
                            <label for="exampleInputName">Question</label>
                            <input type="text" class="form-control" id="exampleInputName" name="question" aria-describedby="" placeholder="Enter Title" value="{{$faq->question}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Answer</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="answer">{{$faq->answer}}</textarea>
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