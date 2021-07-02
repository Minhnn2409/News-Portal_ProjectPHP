@extends('admin.admin_master')

@section('admin')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Photos Update</h4>
                <form class="forms-sample" method="post" action="{{route('photos.update', $photo->id)}}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" class="form-control" id="exampleInputName1"
                                   placeholder="Type title" name="title" value="{{$photo->title}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Photo</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <img src="{{\Illuminate\Support\Facades\URL::to($photo->photo)}}" alt="Anh photo">
                            <input type="hidden" name="oldPhoto" value="{{$photo->photo}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleSelectGender">Type</label>
                            <select class="form-control" id="exampleSelectGender" name="type">
                                <option value="1" {{($photo->type == 1) ? 'Selected' : ''}}>Big Photos</option>
                                <option value="0" {{($photo->type == 0) ? 'Selected' : ''}}>Small Photos</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

