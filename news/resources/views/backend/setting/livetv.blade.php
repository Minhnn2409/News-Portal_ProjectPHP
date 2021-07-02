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
                    <h4 class="card-title">Update LiveTv</h4>
                    <div class="template-demo">
                        @if($livetv->status == 1)
                            <a href="{{route('deactive.livetv', $livetv->id)}}">
                                <button type="button" class="btn btn-danger btn-fw" style="margin-bottom: 10px">Deactive
                                </button>
                            </a>
                        @else
                            <a href="{{route('active.livetv', $livetv->id)}}">
                                <button type="button" class="btn btn-primary btn-fw" style="margin-bottom: 10px">Active
                                </button>
                            </a>
                        @endif
                    </div>
                    @if($livetv->status == 1)
                        <small class="text-success" style="margin-bottom: 20px; display: block">Now LiveTv is
                            Active</small>
                    @else
                        <small class="text-danger" style="margin-bottom: 20px; display: block">Now LiveTv is
                            Deactive</small>
                    @endif
                    <form class="forms-sample" method="post" action="{{route('update.livetv', $livetv->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Embed code</label>
                            <textarea class="form-control" name="embed_code"
                                      id="summernote">{{$livetv->embed_code}}</textarea>
                        </div>
                        @error('embed_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

