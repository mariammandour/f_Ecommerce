@include('Admin.assets.header')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#">Reset password</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Write Email</p>

                <form action="{{url('Admin/forgetPassword_Post')}}" method="post">
                    @csrf
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        <hi>{{ session ('success') }}</h1>
                    </div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                    </div>
                    <div class="row">
                        <div class="col-8">
                            
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Reset</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <p class="mb-1">
                    <a href="{{url('Admin/login')}}">sign in</a>
                </p>
                
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@include('Admin.assets.footer')