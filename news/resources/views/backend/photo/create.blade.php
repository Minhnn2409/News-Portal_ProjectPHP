@extends('admin.admin_master')

@section('admin')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Photos Insert</h4>
                <form class="forms-sample" method="post" action="{{route('photos.store')}}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputName1">English Title</label>
                            <input type="text" class="form-control" id="exampleInputName1"
                                   placeholder="Type English title" name="title_en">
                        </div>
                    </div>
                    @error('title_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputName1">Vietnamese title</label>
                            <input type="text" class="form-control" id="exampleInputName1"
                                   placeholder="Type Vietnamese title" name="title_vie">
                        </div>
                    </div>
                    @error('title_vie')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="row">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Photo</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo">
                        </div>
                    </div>
                    @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleSelectGender">Type</label>
                            <select class="form-control" id="exampleSelectGender" name="type">
                                <option disabled="" selected="">--Select photos</option>
                                <option value="1">Big Image</option>
                                <option value="0">Small Image</option>
                            </select>
                        </div>
                    </div>
                    @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

