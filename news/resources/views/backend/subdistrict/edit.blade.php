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
                    <h4 class="card-title">Edit Subdistrict</h4>
                    <form class="forms-sample" method="post"
                          action="{{route('subdistricts.update', $subdistrict->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Subdistrict in English</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="subdistrict_en"
                                   placeholder="Please type subdistrict in English"
                                   value="{{$subdistrict->subdistrict_en}}">
                        </div>
                        @error('subdistrict_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subdistrict in Vietnamese</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="subdistrict_vie"
                                   placeholder="Please type subdistrict in Vietnamese"
                                   value="{{$subdistrict->subdistrict_vie}}">
                        </div>
                        @error('subdistrict_vie')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">District</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="district_id">
                                    <option disabled="" selected="">-- Select district</option>
                                    @foreach($districts as $district)
                                        <option
                                            {{($district->id == $subdistrict->district_id) ? 'selected' : ''}} value="{{$district->id}}">{{$district->district_en}}
                                            | {{$district->district_vie}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('district_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

