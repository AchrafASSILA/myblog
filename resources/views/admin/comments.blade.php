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
            {{-- <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li> --}}
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
      @if (Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text" style="color: white">{{Session::get('success')}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span style="color: white" aria-hidden="true">&times;</span>
        </button>
    </div>
      @endif
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 style="margin-bottom: 30px">Commants </h6>
              {{-- <a href="{{route('admin.createCategory')}}" style="color: white;
              background: #5e72e4;
              padding: 10px;
              border-radius: 5px;
              display: flex;
              width: fit-content;
              margin-left: auto;
              margin-bottom: 10px;"></a> --}}
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Website</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Comment</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Article Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created at</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($comments as $comment)
                        
                    <tr>
                      <td>

                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{asset('./assets/images/thumbs/masonry/clock-600.jpg')}}" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$comment->name}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$comment->email}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"> {{$comment->website ?$comment->website : 'no website' }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $comment->comment}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $comment->post->title}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$comment->created_at}}</p>
                      </td>
                     
                      <td  class="align-middle" style="display: flex;align-items:center;    height: 68.19px;">
                        {{-- <a href="{{route('admin.editComment',$comment->id)}}" class="text-secondary text-xs font-weight-bold" >
                          Edit
                        </a> --}}
                        <form action="{{route('admin.deleteComment',$comment->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button style="background: transparent;border: none;" onclick="return confirm('are you want to delete this comment')" type="submit"  class="text-secondary text-xs font-weight-bold" >
                            Delete
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <style>
      .pagination{
    display: flex;
    padding-left: 0;
    justify-content: center;
    list-style: none;
  }
    </style>
    {{$comments->links()}}
</main>
@endsection