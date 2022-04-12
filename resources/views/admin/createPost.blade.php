@extends('layout.admin.master')
@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
         
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Type here...">
              </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">Sign In</span>
                </a>
              </li>
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </li>
              <li class="nav-item px-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0">
                  <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                  <p class="mb-0">Create Post</p>
                </div>
              </div>
              <div class="card-body">
                <form action="{{route('admin.storePost')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="title" class="form-control-label">Title</label>
                          <input class="form-control" type="text" name="title" id="title">
                        </div>
                      </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="body" class="form-control-label">Body</label>
                          <textarea class="form-control" rows="6" name="body" id="body" ></textarea>
                        </div>
                      </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="image" class="form-control-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" >  
                        </div>
                      </div>
                </div>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span  style="color: white" class="alert-text">{{$error}}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span style="color: white"  aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endforeach        
                @endif
                
                <button class="btn btn-primary btn-sm ms-auto">Create Post</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</main>


@endsection