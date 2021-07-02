@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">
                        <div class="row align-items-center">
                            <div class="col-4 col-sm-3 col-xl-2">
                                <img src="{{asset('backend/assets/images/dashboard/Group126@2x.png')}}"
                                     class="gradient-corona-img img-fluid" alt="">
                            </div>
                            <div class="col-5 col-sm-7 col-xl-8 p-0">
                                <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                                <p class="mb-0 font-weight-normal d-none d-sm-block">Welcome to Easy News</p>
                            </div>
                            <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="{{url('/')}}" target="_blank"
                             class="btn btn-outline-light btn-rounded get-started-btn">Visit frontend</a>
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Video</h4>
                    <form class="forms-sample" method="post" action="{{route('videos.update', $video->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Video Title</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="title"
                                   placeholder="Please type title" value="{{$video->title}}">
                        </div>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Video Embed Code</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="embed_code"
                                   placeholder="Please type Embed Code" value="{{$video->embed_code}}">
                        </div>
                        @error('embed_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="exampleSelectGender">Type</label>
                                <select class="form-control" id="exampleSelectGender" name="type">
                                    <option value="1" {{($video->type == 1) ? 'Selected' : ''}}>Big Video</option>
                                    <option value="0" {{($video->type == 0) ? 'Selected' : ''}}>Small Video</option>
                                </select>
                            </div>
                        </div>
                        @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

