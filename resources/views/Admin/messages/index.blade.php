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
                                        <th>name</th>
                                        <th>email</th>
                                        <th>subject</th>
                                        <th>message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>subject</th>
                                        <th>message</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @foreach($messages as $key => $message)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->subject}}</td>
                                            <td>{{$message->message}}</td>
                                            <td>
                                                <a href='' data-toggle="modal" data-target="#modal_single_del{{$key}}" class='btn btn-danger m-r-1em'>Remove </a>
													<div class="modal" id="modal_single_del{{$key}}" tabindex="-1" role="dialog">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title">delete confirmation</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>

																<div class="modal-body">
																	Remove message !!!!
																</div>
																<div class="modal-footer">
																	<form action="{{route('admin.messages.delete')}}" method="post">
																		@csrf
																		@method('delete')
                                                                        <input type="hidden" name="message_id" value="{{$message->id}}">
																		<div class="not-empty-record">
																			<button type="submit" class="btn btn-danger">Delete</button>
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
						
                                            </td>
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