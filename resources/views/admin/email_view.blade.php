<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
    @include('admin.navbar')
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container">
                <h1 class="mt-2" style="font-size: 2em;">Add Doctor</h1>
                <div class="row">
                    <div class="col-6 mt-4">
                        @if(session()->has('message'))
                            <div class="alert alert-success mb-2">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{session()->get('message')}}
                            </div>
                        @endif
                        <form action="{{url('send-mail',$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="greeting">Greeting Message</label>
                                <input type="text" name="greeting" id="greeting" class="form-control bg-background text-white" required="">
                            </div>
                            <div class="form-group mb-4">
                                <label for="body">Description</label>
                                <input type="text" name="body" id="body" class="form-control bg-background text-white" required="">
                            </div>
                            <div class="form-group mb-4">
                                <label for="action_text">Action Text</label>
                                <input type="text" name="action_text" id="action_text" class="form-control bg-background text-white" required="">
                            </div>
                            <div class="form-group mb-4">
                                <label for="action_url">Action Url</label>
                                <input type="text" name="action_url" id="action_url" class="form-control bg-background text-white" required="">
                            </div>
                            <div class="form-group mb-4">
                                <label for="end_part">End Part</label>
                                <input type="text" name="end_part" id="end_part" class="form-control bg-background text-white" required="">
                            </div>
                            <button class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
<!-- End custom js for this page -->
</body>
</html>
