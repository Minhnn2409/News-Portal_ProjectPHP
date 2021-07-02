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
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">subcategory table</h4>
                    <div class="template-demo">
                        <a href="{{route('subcategories.create')}}">
                            <button type="button" class="btn btn-primary btn-fw" style="float: right">Add subcategory
                            </button>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th>Subcategory English</th>
                                <th>Subcategory Vietnam</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($subcategories as $subcategory)
                                <tr>
                                    <td> {{$i++}}</td>
                                    <td> {{$subcategory->subcategory_en}}</td>
                                    <td> {{$subcategory->subcategory_vie}}</td>
                                    <td> {{$subcategory->category_en}} | {{$subcategory->category_vie}}</td>
                                    <td>
                                        <a href="{{route('subcategories.edit', $subcategory->id)}}"
                                           class="btn btn-info">Edit</a>
                                        <a href="{{route('subcategories.delete', $subcategory->id)}}"
                                           class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$subcategories->links('pagination-links')}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
