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
        <div class="container-fluid p-5 justify-content-center">
            <div class="container">
                <div class="card justify-content-center">
                    <div class="card-body">
                        <h1 class="mt-4 text-center" style="font-size: 2em;">Edit Doctor Details</h1>
                        <div class="row">
                            <div class="col-6 mt-4 mx-auto">
                                <form action="{{url('update-doctor')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$doctor->id}}">
                                    <div class="form-group mb-4">
                                        <label for="name">Doctor Name</label>
                                        <input type="text" name="name" id="name" class="form-control bg-background text-white" required="" value="{{$doctor->name}}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="phone">Doctor Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control bg-background text-white" required="" value="{{$doctor->phone}}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="special">Speciality</label>
                                        <span class="d-block text-capitalize mb-2 text-muted">Old data - {{$doctor->speciality}} Specialist</span>
                                        <label for="special">Edit New Speciality</label>
                                        <select name="speciality" id="special" required="" class="form-control custom-select text-white">
                                            <option value="{{$doctor->speciality}}">Don't update Speciality</option>
                                            <option value="skin">Skin</option>
                                            <option value="heart">Heart</option>
                                            <option value="eye">Eye</option>
                                            <option value="ear">Ear</option>
                                            <option value="nose">Nose</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="room">Room No</label>
                                        <input type="text" name="room" id="room" class="form-control bg-background text-white" required=""  value="{{$doctor->room}}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="image">Doctor Image</label>
                                        <span class="d-block mb-2 text-muted">Old Image</span>
                                        <img src="{{asset('doctor_image/'.$doctor->image)}}" alt="" style="width: 60px;height: 60px;border-radius: 50%;background-size: contain">
                                        <span class="d-block my-2 text-muted">Choose New Image</span>
                                        <input type="file" name="image" id="image" class="form-control bg-background text-white p-1">
                                    </div>
                                    <button class="btn btn-primary float-right">Update</button>
                                </form>
                            </div>
                        </div>
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
