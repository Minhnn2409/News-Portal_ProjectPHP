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
                    <h4 class="card-title">Update Prayers</h4>
                    <form class="forms-sample" method="post" action="{{route('update.prayer', $prayer->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Fajr</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="fajr"
                                   placeholder="Please type fajr" value="{{$prayer->fajr}}">
                        </div>
                        @error('fajr')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Johor</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="johor"
                                   placeholder="Please type johor"
                                   value="{{$prayer->johor}}">
                        </div>
                        @error('johor')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputUsername1">Asor</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="asor"
                                   placeholder="Please type asor" value="{{$prayer->asor}}">
                        </div>
                        @error('asor')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Magrib</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="magrib"
                                   placeholder="Please type magrib"
                                   value="{{$prayer->magrib}}">
                        </div>
                        @error('magrib')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Eaha</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="eaha"
                                   placeholder="Please type eaha"
                                   value="{{$prayer->eaha}}">
                        </div>
                        @error('eaha')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jummah</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="jummah"
                                   placeholder="Please type jummah"
                                   value="{{$prayer->jummah}}">
                        </div>
                        @error('jummah')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

