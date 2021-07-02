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
                    <h4 class="card-title">Update Seos</h4>
                    <form class="forms-sample" method="post" action="{{route('update.seo', $seo->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Meta_author</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="meta_author"
                                   placeholder="Please type meta_author" value="{{$seo->meta_author}}">
                        </div>
                        @error('meta_author')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputUsername1">Meta_title</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="meta_title"
                                   placeholder="Please type meta_title" value="{{$seo->meta_title}}">
                        </div>
                        @error('meta_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputUsername1">Meta_keyword</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="meta_keyword"
                                   placeholder="Please type meta_keyword" value="{{$seo->meta_keyword}}">
                        </div>
                        @error('meta_keyword')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputUsername1">Meta_description</label>
                            <textarea class="form-control" name="meta_description"
                                      id="summernote">{{$seo->meta_description}}</textarea>
                        </div>
                        @error('meta_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputUsername1">Google_analytics</label>
                            <textarea class="form-control" name="google_analytics"
                                      id="summernote1">{{$seo->google_analytics}}</textarea>
                        </div>
                        @error('google_analytics')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputUsername1">Google_verification</label>
                            <input type="text" class="form-control" id="exampleInputUsername1"
                                   name="google_verification"
                                   placeholder="Please type google_verification" value="{{$seo->google_verification}}">
                        </div>
                        @error('google_verification')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputUsername1">Alexa_analytics</label>
                            <textarea class="form-control" name="alexa_analytics"
                                      id="summernote2">{{$seo->alexa_analytics}}</textarea>
                        </div>
                        @error('alexa_analytics')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

