@extends('admin.admin_master')

@section('admin')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">News Post Update</h4>
                <form class="forms-sample" method="post" action="{{route('posts.update', $post->id)}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">Categories</label>
                            <select class="form-control" id="exampleSelectGender" name="category_id">
                                <option disabled="" selected="">--Select category</option>
                                @foreach($categories as $category)
                                    <option
                                        {{($category->id == $post->category_id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->category_en}}
                                        | {{$category->category_vie}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="subcategory_id">Subcategories</label>
                            <select class="form-control" id="subcategory_id" name="subcategory_id">
                                <option disabled="" selected="">--Select subcategory</option>
                                @foreach($subcategories as $subcategory)
                                    <option
                                        {{($subcategory->id == $post->subcategory_id) ? 'selected' : ''}} value="{{$subcategory->id}}">{{$subcategory->subcategory_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">Districts</label>
                            <select class="form-control" id="exampleSelectGender" name="district_id">
                                <option disabled="" selected="">--Select district</option>
                                @foreach($districts as $district)
                                    <option
                                        {{($district->id == $post->district_id) ? 'selected' : ''}} value="{{$district->id}}">{{$district->district_en}}
                                        | {{$district->district_vie}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">Subdistricts</label>
                            <select class="form-control" id="subdistrict_id" name="subdistrict_id">
                                <option disabled="" selected="">--Select subdistrict</option>
                                @foreach($subdistricts as $subdistrict)
                                    <option
                                        {{($subdistrict->id == $post->subdistrict_id) ? 'selected' : ''}} value="{{$subdistrict->id}}">{{$subdistrict->subdistrict_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">English title</label>
                            <input type="text" class="form-control" id="exampleInputName1"
                                   placeholder="Type English title" name="title_en" value="{{$post->title_en}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Vietnamese title</label>
                            <input type="text" class="form-control" id="exampleInputName1"
                                   placeholder="Type Vietnamese title" name="title_vie" value="{{$post->title_vie}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">English tags</label>
                            <input type="text" class="form-control" id="exampleInputName1"
                                   placeholder="Type English tags" name="tags_en" value="{{$post->tags_en}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Vietnamese tags</label>
                            <input type="text" class="form-control" id="exampleInputName1"
                                   placeholder="Type Vietnamese tags" name="tags_vie" value="{{$post->tags_vie}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                        </div>
                        <div class="form-group col-md-6">
                            <img src="{{\Illuminate\Support\Facades\URL::to($post->image)}}"
                                 style="width: 70px; height: 70px" alt="Anh Post">
                            <input type="hidden" value="{{$post->image}}" name="oldImage">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>English detail</label>
                        <textarea class="form-control" id="summernote" name="details_en"
                                  rows="4">{{$post->details_en}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Vietnamese detail</label>
                        <textarea class="form-control" id="summernote1" name="details_vie"
                                  rows="4">{{$post->details_vie}}</textarea>
                    </div>
                    <hr>
                    <h4 class="text-center">Extra Options</h4>
                    <div class="row">
                        <label class="form-check-label col-md-3">
                            <input type="checkbox" class="form-check-input" name="headline"
                                   value="1" {{($post->headline == 1) ? 'checked' : '' }}> Headline <i
                                class="input-helper"></i></label>
                        <label class="form-check-label col-md-3">
                            <input type="checkbox" class="form-check-input" name="bigthumbnail"
                                   value="1" {{($post->bigthumbnail == 1) ? 'checked' : '' }}> General Big
                            Thumbnail
                            <i
                                class="input-helper"></i></label>
                        <label class="form-check-label col-md-3">
                            <input type="checkbox" class="form-check-input" name="first_section"
                                   value="1" {{($post->first_section == 1) ? 'checked' : '' }}> First
                            Section <i
                                class="input-helper"></i></label>
                        <label class="form-check-label col-md-3">
                            <input type="checkbox" class="form-check-input" name="first_section_thumbnail"
                                   value="1" {{($post->first_section_thumbnail == 1) ? 'checked' : '' }}>
                            First
                            Section BigThumbnail
                            <i
                                class="input-helper"></i></label>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{url('/get/subcategory/')}}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $("#subcategory_id").empty();
                            $.each(data, function (key, value) {
                                $("#subcategory_id").append('<option value="' + value.id + '">' + value.subcategory_en +
                                    '</option>'
                                )
                                ;
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="district_id"]').on('change', function () {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{url('/get/subdistrict/')}}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $("#subdistrict_id").empty();
                            $.each(data, function (key, value) {
                                $("#subdistrict_id").append('<option value="' + value.id + '">' + value.subdistrict_en +
                                    '</option>'
                                )
                                ;
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            })
        })
    </script>

@endsection

