@extends('main.home_master')
@section('contents')
    <!-- top-add-start -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="top-add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /.top-add-close -->

    <!-- date-start -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="date">
                        <ul>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> Dhaka</li>
                            <li><i class="fa fa-calendar" aria-hidden="true"></i> Monday, 19th October 2020</li>
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i> Update 5 min ago</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.date-close -->

    <!-- notice-start -->

    <section>
        <div class="container-fluid">
            <div class="row scroll">
                <div class="col-md-2 col-sm-3 scroll_01 ">
                    Breaking News :
                </div>
                <div class="col-md-10 col-sm-9 scroll_02">
                    <marquee>wellcome to our website...</marquee>
                </div>
            </div>
        </div>
    </section>

    <!-- 1st-news-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    @php
                        $firstSectionThumb = \Illuminate\Support\Facades\DB::table('posts')->where('first_section_thumbnail', 1)->first();
                    @endphp
                    <div class="row">
                        <div class="col-md-1 col-sm-1 col-lg-1"></div>
                        <div class="col-md-10 col-sm-10">
                            <div class="lead-news">
                                <div class="service-img"><a
                                        href="{{\Illuminate\Support\Facades\URL::to('/view/post', $firstSectionThumb->id)}}"><img
                                            src="{{$firstSectionThumb->image}}" width="800px"
                                            alt="Notebook"></a></div>
                                <div class="content">
                                    @if(Session()->get('lang') == 'English')
                                        <h4 class="lead-heading-01"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $firstSectionThumb->id)}}">{{$firstSectionThumb->title_en}}</a>
                                        </h4>
                                    @else
                                        <h4 class="lead-heading-01"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $firstSectionThumb->id)}}">{{$firstSectionThumb->title_vie}}</a>
                                        </h4>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    @php
                        $firstSectionPosts = \Illuminate\Support\Facades\DB::table('posts')->where('first_section', 1)->limit(8)->get();
                    @endphp
                    <div class="row">
                        @foreach($firstSectionPosts as $firstSectionPost)
                            <div class="col-md-3 col-sm-3">
                                <div class="top-news">
                                    <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $firstSectionPost->id)}}"><img
                                            src="{{asset($firstSectionPost->image)}}" alt="Notebook"></a>
                                    @if(Session()->get('lang') == 'English')
                                        <h4 class="heading-02"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $firstSectionPost->id)}}">{{$firstSectionPost->title_en}}</a>
                                        </h4>
                                    @else
                                        <h4 class="heading-02"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $firstSectionPost->id)}}">{{\Illuminate\Support\Str::limit($firstSectionPost->title_vie, 80)}}</a>
                                        </h4>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt=""/></div>
                        </div>
                    </div><!-- /.add-close -->

                @php
                    $firstCategory = \Illuminate\Support\Facades\DB::table('categories')->where('category_en', 'INTERNATIONAL')->first();
                        $bigThumbnail = \Illuminate\Support\Facades\DB::table('posts')->join('categories','posts.category_id', 'categories.id')
                                                                                    ->where('category_id', $firstCategory->id)
                                                                                    ->where('bigthumbnail', 1)
                                                                                    ->select('posts.*','categories.category_en', 'categories.category_vie')
                                                                                    ->orderByDesc('posts.id')
                                                                                    ->first();
                        $postItemThumbnails = \Illuminate\Support\Facades\DB::table('posts')->where('category_id', $firstCategory->id)
                        ->where('bigthumbnail', NULL)
                        ->orderByDesc('id')
                        ->limit(3)->get();
                @endphp
                <!-- news-start -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="bg-one">
                                @if(Session()->get('lang') == 'English')
                                    <div class="cetagory-title"><a href="#">{{$bigThumbnail->category_en}} <span>More <i
                                                    class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
                                    </div>
                                @else
                                    <div class="cetagory-title"><a href="#">{{$bigThumbnail->category_vie}} <span>Xem thêm <i
                                                    class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnail->id)}}"><img
                                                    src="{{\Illuminate\Support\Facades\URL::to($bigThumbnail->image)}}"
                                                    alt="Notebook"></a>
                                            @if(Session()->get('lang') == 'English')
                                                <h4 class="heading-02"><a
                                                        href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnail->id)}}">{{$bigThumbnail->title_en}}</a>
                                                </h4>
                                            @else
                                                <h4 class="heading-02"><a
                                                        href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnail->id)}}">{{$bigThumbnail->title_vie}}</a>
                                                </h4>
                                            @endif
                                        </div>
                                    </div>
                                    @foreach($postItemThumbnails as $postItem)
                                        <div class="col-md-6 col-sm-6">
                                            <div class="image-title">
                                                <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItem->id)}}"><img
                                                        src="{{\Illuminate\Support\Facades\URL::to($postItem->image)}}"
                                                        alt="Notebook"></a>
                                                @if(Session()->get('lang') == 'English')
                                                    <h4 class="heading-02"><a
                                                            href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItem->id)}}">{{\Illuminate\Support\Str::limit($postItem->title_en, 30)}}</a>
                                                    </h4>
                                                @else
                                                    <h4 class="heading-02"><a
                                                            href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItem->id)}}">{{\Illuminate\Support\Str::limit($postItem->title_vie, 30)}}</a>
                                                    </h4>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @php
                            $secondCategory = \Illuminate\Support\Facades\DB::table('categories')->where('category_en', 'MONEY')->first();
                          $bigThumbnailSecond = \Illuminate\Support\Facades\DB::table('posts')->join('categories','posts.category_id', 'categories.id')
                                                                                      ->where('category_id', $secondCategory->id)
                                                                                      ->where('bigthumbnail', 1)
                                                                                      ->select('posts.*','categories.category_en', 'categories.category_vie')
                                                                                      ->orderByDesc('posts.id')
                                                                                      ->first();
                          $postItemThumbnailSeconds = \Illuminate\Support\Facades\DB::table('posts')->where('category_id', $secondCategory->id)
                          ->where('bigthumbnail', NULL)
                          ->orderByDesc('id')
                          ->limit(3)->get();
                        @endphp
                        <div class="col-md-6 col-sm-6">
                            <div class="bg-one">
                                @if(Session()->get('lang') == 'English')
                                    <div class="cetagory-title"><a href="#">{{$bigThumbnailSecond->category_en}} <span>More <i
                                                    class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
                                    </div>
                                @else
                                    <div class="cetagory-title"><a href="#">{{$bigThumbnailSecond->category_vie}} <span>Xem thêm <i
                                                    class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailSecond->id)}}"><img
                                                    src="{{\Illuminate\Support\Facades\URL::to($bigThumbnailSecond->image)}}"
                                                    alt="Notebook"></a>
                                            @if(Session()->get('lang') == 'English')
                                                <h4 class="heading-02"><a
                                                        href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailSecond->id)}}">{{$bigThumbnailSecond->title_en}}</a>
                                                </h4>
                                            @else
                                                <h4 class="heading-02"><a
                                                        href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailSecond->id)}}">{{$bigThumbnailSecond->title_vie}}</a>
                                                </h4>
                                            @endif
                                        </div>
                                    </div>
                                    @foreach($postItemThumbnailSeconds as $postItemSecond)
                                        <div class="col-md-6 col-sm-6">
                                            <div class="image-title">
                                                <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemSecond->id)}}"><img
                                                        src="{{\Illuminate\Support\Facades\URL::to($postItemSecond->image)}}"
                                                        alt="Notebook"></a>
                                                @if(Session()->get('lang') == 'English')
                                                    <h4 class="heading-02"><a
                                                            href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemSecond->id)}}">{{\Illuminate\Support\Str::limit($postItemSecond->title_en, 30)}}</a>
                                                    </h4>
                                                @else
                                                    <h4 class="heading-02"><a
                                                            href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemSecond->id)}}">{{\Illuminate\Support\Str::limit($postItemSecond->title_vie, 30)}}</a>
                                                    </h4>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3">
                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add"><img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt=""/>
                            </div>
                        </div>
                    </div><!-- /.add-close -->
                    <!-- youtube-live-start -->
                    @php
                        $livetvs = \Illuminate\Support\Facades\DB::table('livetvs')->first();
                    @endphp
                    @if($livetvs->status == 1)
                        <div class="cetagory-title-03">Live TV</div>
                        <div class="photo">
                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item"
                                 style="margin-bottom:5px;">
                                {!! html_entity_decode($livetvs->embed_code) !!}
                            </div>
                        </div><!-- /.youtube-live-close -->
                @endif
                <!-- facebook-page-start -->
                    <div class="cetagory-title-03">Facebook</div>
                    <div class="fb-root">
                        facebook page here
                    </div><!-- /.facebook-page-close -->

                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add">
                                <img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt=""/>
                            </div>
                        </div>
                    </div><!-- /.add-close -->
                </div>
            </div>
        </div>
    </section><!-- /.1st-news-section-close -->

    <!-- 2nd-news-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                @php
                    $thirdCategory = \Illuminate\Support\Facades\DB::table('categories')->where('category_en', 'MOTORS')->first();
                  $bigThumbnailThird = \Illuminate\Support\Facades\DB::table('posts')->join('categories','posts.category_id', 'categories.id')
                                                                              ->where('category_id', $thirdCategory->id)
                                                                              ->where('bigthumbnail', 1)
                                                                              ->select('posts.*','categories.category_en', 'categories.category_vie')
                                                                              ->orderByDesc('posts.id')
                                                                              ->first();
                  $postItemThumbnailThirds = \Illuminate\Support\Facades\DB::table('posts')->where('category_id', $thirdCategory->id)
                  ->where('bigthumbnail', NULL)
                  ->orderByDesc('id')
                  ->limit(3)->get();
                @endphp
                <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        @if(Session()->get('lang') == 'English')
                            <div class="cetagory-title-02"><a href="#">{{$thirdCategory->category_en}} <i
                                        class="fa fa-angle-right"
                                        aria-hidden="true"></i> <span><i
                                            class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                        @else
                            <div class="cetagory-title-02"><a href="#">{{$thirdCategory->category_vie}} <i
                                        class="fa fa-angle-right"
                                        aria-hidden="true"></i> <span><i
                                            class="fa fa-plus" aria-hidden="true"></i>Xem thêm  </span></a></div>
                        @endif

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailThird->id)}}"><img
                                            src="{{\Illuminate\Support\Facades\URL::to($bigThumbnailThird->image)}}"
                                            alt="Notebook"></a>
                                    @if(Session()->get('lang') == 'English')
                                        <h4 class="heading-02"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailThird->id)}}">{{$bigThumbnailThird->title_en}}</a>
                                        </h4>
                                    @else
                                        <h4 class="heading-02"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailThird->id)}}">{{$bigThumbnailThird->title_vie}}</a>
                                        </h4>
                                    @endif
                                </div>
                            </div>
                            @foreach($postItemThumbnailThirds as $postItemThird)
                                <div class="col-md-6 col-sm-6">
                                    <div class="image-title">
                                        <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemThird->id)}}"><img
                                                src="{{\Illuminate\Support\Facades\URL::to($postItemThird->image)}}"
                                                alt="Notebook"></a>
                                        @if(Session()->get('lang') == 'English')
                                            <h4 class="heading-02"><a
                                                    href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemThird->id)}}">{{\Illuminate\Support\Str::limit($postItemThird->title_en, 30)}}</a>
                                            </h4>
                                        @else
                                            <h4 class="heading-02"><a
                                                    href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemThird->id)}}">{{\Illuminate\Support\Str::limit($postItemThird->title_vie, 30)}}</a>
                                            </h4>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @php
                    $fourthCategory = \Illuminate\Support\Facades\DB::table('categories')->where('category_en', 'BUSINESS')->first();
                  $bigThumbnailFourth = \Illuminate\Support\Facades\DB::table('posts')->join('categories','posts.category_id', 'categories.id')
                                                                              ->where('category_id', $fourthCategory->id)
                                                                              ->where('bigthumbnail', 1)
                                                                              ->select('posts.*','categories.category_en', 'categories.category_vie')
                                                                              ->orderByDesc('posts.id')
                                                                              ->first();
                  $postItemThumbnailFourths = \Illuminate\Support\Facades\DB::table('posts')->where('category_id', $fourthCategory->id)
                  ->where('bigthumbnail', NULL)
                  ->orderByDesc('id')
                  ->limit(3)->get();
                @endphp
                <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        @if(Session()->get('lang') == 'English')
                            <div class="cetagory-title-02"><a href="#">{{$fourthCategory->category_en}} <i
                                        class="fa fa-angle-right"
                                        aria-hidden="true"></i> <span><i
                                            class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                        @else
                            <div class="cetagory-title-02"><a href="#">{{$fourthCategory->category_vie}} <i
                                        class="fa fa-angle-right"
                                        aria-hidden="true"></i> <span><i
                                            class="fa fa-plus" aria-hidden="true"></i>Xem thêm  </span></a></div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailFourth->id)}}"><img
                                            src="{{\Illuminate\Support\Facades\URL::to($bigThumbnailFourth->image)}}"
                                            alt="Notebook"></a>
                                    @if(Session()->get('lang') == 'English')
                                        <h4 class="heading-02"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailFourth->id)}}">{{$bigThumbnailFourth->title_en}}</a>
                                        </h4>
                                    @else
                                        <h4 class="heading-02"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailFourth->id)}}">{{$bigThumbnailFourth->title_vie}}</a>
                                        </h4>
                                    @endif
                                </div>
                            </div>
                            @foreach($postItemThumbnailFourths as $postItemFourth)
                                <div class="col-md-6 col-sm-6">
                                    <div class="image-title">
                                        <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemFourth->id)}}"><img
                                                src="{{\Illuminate\Support\Facades\URL::to($postItemFourth->image)}}"
                                                alt="Notebook"></a>
                                        @if(Session()->get('lang') == 'English')
                                            <h4 class="heading-02"><a
                                                    href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemFourth->id)}}">{{\Illuminate\Support\Str::limit($postItemFourth->title_en, 30)}}</a>
                                            </h4>
                                        @else
                                            <h4 class="heading-02"><a
                                                    href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemFourth->id)}}">{{\Illuminate\Support\Str::limit($postItemFourth->title_vie, 30)}}</a>
                                            </h4>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- ******* -->
            <div class="row">
                @php
                    $fifthCategory = \Illuminate\Support\Facades\DB::table('categories')->where('category_en', 'ENTERTAINMENT')->first();
                  $bigThumbnailFifth = \Illuminate\Support\Facades\DB::table('posts')->join('categories','posts.category_id', 'categories.id')
                                                                              ->where('category_id', $fifthCategory->id)
                                                                              ->where('bigthumbnail', 1)
                                                                              ->select('posts.*','categories.category_en', 'categories.category_vie')
                                                                              ->orderByDesc('posts.id')
                                                                              ->first();
                  $postItemThumbnailFifths = \Illuminate\Support\Facades\DB::table('posts')->where('category_id', $fifthCategory->id)
                  ->where('bigthumbnail', NULL)
                  ->orderByDesc('id')
                  ->limit(3)->get();
                @endphp
                <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        @if(Session()->get('lang') == 'English')
                            <div class="cetagory-title-02"><a href="#">{{$fifthCategory->category_en}} <i
                                        class="fa fa-angle-right"
                                        aria-hidden="true"></i> <span><i
                                            class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                        @else
                            <div class="cetagory-title-02"><a href="#">{{$fifthCategory->category_vie}} <i
                                        class="fa fa-angle-right"
                                        aria-hidden="true"></i> <span><i
                                            class="fa fa-plus" aria-hidden="true"></i>Xem thêm  </span></a></div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailFifth->id)}}"><img
                                            src="{{\Illuminate\Support\Facades\URL::to($bigThumbnailFifth->image)}}"
                                            alt="Notebook"></a>
                                    @if(Session()->get('lang') == 'English')
                                        <h4 class="heading-02"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailFifth->id)}}">{{$bigThumbnailFifth->title_en}}</a>
                                        </h4>
                                    @else
                                        <h4 class="heading-02"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailFifth->id)}}">{{$bigThumbnailFifth->title_vie}}</a>
                                        </h4>
                                    @endif
                                </div>
                            </div>
                            @foreach($postItemThumbnailFifths as $postItemFifth)
                                <div class="col-md-6 col-sm-6">
                                    <div class="image-title">
                                        <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemFifth->id)}}"><img
                                                src="{{\Illuminate\Support\Facades\URL::to($postItemFifth->image)}}"
                                                alt="Notebook"></a>
                                        @if(Session()->get('lang') == 'English')
                                            <h4 class="heading-02"><a
                                                    href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemFifth->id)}}">{{\Illuminate\Support\Str::limit($postItemFifth->title_en, 30)}}</a>
                                            </h4>
                                        @else
                                            <h4 class="heading-02"><a
                                                    href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemFifth->id)}}">{{\Illuminate\Support\Str::limit($postItemFifth->title_vie, 30)}}</a>
                                            </h4>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @php
                    $sixthCategory = \Illuminate\Support\Facades\DB::table('categories')->where('category_en', 'LIFE STYLE')->first();
                  $bigThumbnailSixth = \Illuminate\Support\Facades\DB::table('posts')->join('categories','posts.category_id', 'categories.id')
                                                                              ->where('category_id', $sixthCategory->id)
                                                                              ->where('bigthumbnail', 1)
                                                                              ->select('posts.*','categories.category_en', 'categories.category_vie')
                                                                              ->orderByDesc('posts.id')
                                                                              ->first();
                  $postItemThumbnailSixths = \Illuminate\Support\Facades\DB::table('posts')->where('category_id', $sixthCategory->id)
                  ->where('bigthumbnail', NULL)
                  ->orderByDesc('id')
                  ->limit(3)->get();
                @endphp
                <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        @if(Session()->get('lang') == 'English')
                            <div class="cetagory-title-02"><a href="#">{{$sixthCategory->category_en}} <i
                                        class="fa fa-angle-right"
                                        aria-hidden="true"></i> <span><i
                                            class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                        @else
                            <div class="cetagory-title-02"><a href="#">{{$sixthCategory->category_vie}} <i
                                        class="fa fa-angle-right"
                                        aria-hidden="true"></i> <span><i
                                            class="fa fa-plus" aria-hidden="true"></i>Xem thêm  </span></a></div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailSixth->id)}}"><img
                                            src="{{\Illuminate\Support\Facades\URL::to($bigThumbnailSixth->image)}}"
                                            alt="Notebook"></a>
                                    @if(Session()->get('lang') == 'English')
                                        <h4 class="heading-02"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailSixth->id)}}">{{$bigThumbnailSixth->title_en}}</a>
                                        </h4>
                                    @else
                                        <h4 class="heading-02"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailSixth->id)}}">{{$bigThumbnailSixth->title_vie}}</a>
                                        </h4>
                                    @endif
                                </div>
                            </div>
                            @foreach($postItemThumbnailSixths as $postItemSixth)
                                <div class="col-md-6 col-sm-6">
                                    <div class="image-title">
                                        <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemSixth->id)}}"><img
                                                src="{{\Illuminate\Support\Facades\URL::to($postItemSixth->image)}}"
                                                alt="Notebook"></a>
                                        @if(Session()->get('lang') == 'English')
                                            <h4 class="heading-02"><a
                                                    href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemSixth->id)}}">{{\Illuminate\Support\Str::limit($postItemSixth->title_en, 30)}}</a>
                                            </h4>
                                        @else
                                            <h4 class="heading-02"><a
                                                    href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemSixth->id)}}">{{\Illuminate\Support\Str::limit($postItemSixth->title_vie, 30)}}</a>
                                            </h4>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- add-start -->
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt=""/></div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt=""/></div>
                </div>
            </div><!-- /.add-close -->

        </div>
    </section><!-- /.2nd-news-section-close -->

    <!-- 3rd-news-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-sm-9">

                    @php
                        $seventhCategory = \Illuminate\Support\Facades\DB::table('categories')->where('category_en', 'SPORTS')->first();
                      $bigThumbnailSeven = \Illuminate\Support\Facades\DB::table('posts')->join('categories','posts.category_id', 'categories.id')
                                                                                  ->where('category_id', $seventhCategory->id)
                                                                                  ->where('bigthumbnail', 1)
                                                                                  ->select('posts.*','categories.category_en', 'categories.category_vie')
                                                                                  ->orderByDesc('posts.id')
                                                                                  ->first();
                      $postItemThumbnailSevenths = \Illuminate\Support\Facades\DB::table('posts')->where('category_id', $seventhCategory->id)
                      ->where('bigthumbnail', NULL)
                      ->orderByDesc('id')
                      ->limit(3)->get();
                    @endphp
                    <div class="col-md-12 col-sm-12">
                        @if(Session()->get('lang') == 'English')
                            <div class="cetagory-title-02"><a href="#">{{$seventhCategory->category_en}} <i
                                        class="fa fa-angle-right"
                                        aria-hidden="true"></i> <span><i
                                            class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                        @else
                            <div class="cetagory-title-02"><a href="#">{{$seventhCategory->category_vie}} <i
                                        class="fa fa-angle-right"
                                        aria-hidden="true"></i> <span><i
                                            class="fa fa-plus" aria-hidden="true"></i>Xem thêm  </span></a></div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="top-news">
                                <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailSeven->id)}}"><img
                                        src="{{asset($bigThumbnailSeven->image)}}" alt="Notebook"></a>
                                @if(Session()->get('lang') == 'English')
                                    <h4 class="heading-02"><a
                                            href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailSeven->id)}}">{{$bigThumbnailSeven->title_en}}</a>
                                    </h4>
                                @else
                                    <h4 class="heading-02"><a
                                            href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailSeven->id)}}">{{$bigThumbnailSeven->title_vie}}
                                            c</a></h4>
                                @endif
                            </div>
                        </div>
                        @foreach($postItemThumbnailSevenths as $postItemSeven)
                            <div class="col-md-4 col-sm-4">
                                <div class="image-title">
                                    <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemSeven->id)}}"><img
                                            src="{{asset($postItemSeven->image)}}" alt="Notebook"></a>
                                    @if(Session()->get('lang') == 'English')
                                        <h4 class="heading-03"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemSeven->id)}}">{{$postItemSeven->title_en}}</a>
                                        </h4>
                                    @else
                                        <h4 class="heading-03"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemSeven->id)}}">{{$postItemSeven->title_vie}}</a>
                                        </h4>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- ******* -->
                    <br/>
                    <div class="row">
                        @php
                            $eighthCategory = \Illuminate\Support\Facades\DB::table('categories')->where('category_en', 'SCI-TECH')->first();
                          $bigThumbnailEight = \Illuminate\Support\Facades\DB::table('posts')->join('categories','posts.category_id', 'categories.id')
                                                                                      ->where('category_id', $eighthCategory->id)
                                                                                      ->where('bigthumbnail', 1)
                                                                                      ->select('posts.*','categories.category_en', 'categories.category_vie')
                                                                                      ->orderByDesc('posts.id')
                                                                                      ->first();
                          $postItemThumbnailEighths = \Illuminate\Support\Facades\DB::table('posts')->where('category_id', $eighthCategory->id)
                          ->where('bigthumbnail', NULL)
                          ->orderByDesc('id')
                          ->limit(3)->get();
                        @endphp
                        <div class="col-md-12 col-sm-12">
                            @if(Session()->get('lang') == 'English')
                                <div class="cetagory-title-02"><a href="#">{{$eighthCategory->category_en}} <i
                                            class="fa fa-angle-right"
                                            aria-hidden="true"></i> <span><i
                                                class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                            @else
                                <div class="cetagory-title-02"><a href="#">{{$eighthCategory->category_vie}} <i
                                            class="fa fa-angle-right"
                                            aria-hidden="true"></i> <span><i
                                                class="fa fa-plus" aria-hidden="true"></i>Xem thêm  </span></a></div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="top-news">
                                    <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailEight->id)}}"><img
                                            src="{{asset($bigThumbnailEight->image)}}" alt="Notebook"></a>
                                    @if(Session()->get('lang') == 'English')
                                        <h4 class="heading-02"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailEight->id)}}">{{$bigThumbnailEight->title_en}}</a>
                                        </h4>
                                    @else
                                        <h4 class="heading-02"><a
                                                href="{{\Illuminate\Support\Facades\URL::to('/view/post', $bigThumbnailEight->id)}}">{{$bigThumbnailEight->title_vie}}
                                                c</a></h4>
                                    @endif
                                </div>
                            </div>
                            @foreach($postItemThumbnailEighths as $postItemEight)
                                <div class="col-md-4 col-sm-4">
                                    <div class="image-title">
                                        <a href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemEight->id)}}"><img
                                                src="{{asset($postItemEight->image)}}" alt="Notebook"></a>
                                        @if(Session()->get('lang') == 'English')
                                            <h4 class="heading-03"><a
                                                    href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemEight->id)}}">{{$postItemEight->title_en}}</a>
                                            </h4>
                                        @else
                                            <h4 class="heading-03"><a
                                                    href="{{\Illuminate\Support\Facades\URL::to('/view/post', $postItemEight->id)}}">{{$postItemEight->title_vie}}</a>
                                            </h4>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="tab-header">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab"
                                                                      data-toggle="tab" aria-expanded="false">Latest</a>
                            </li>
                            <li role="presentation"><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab"
                                                       aria-expanded="true">Popular</a></li>
                            <li role="presentation"><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab"
                                                       aria-expanded="true">Popular1</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content ">
                            <div role="tabpanel" class="tab-pane in active" id="tab21">
                                <div class="news-titletab">
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Both education and life must be saved</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab22">
                                <div class="news-titletab">
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Both education and life must be saved</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab23">
                                <div class="news-titletab">
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Both education and life must be saved</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Namaj Times -->
                {{--                    <div class="cetagory-title-03">Prayer Time</div>--}}
                {{--                    Prayer Times count option here--}}
                <!-- Namaj Times -->
                    <div class="cetagory-title-03">Old News</div>
                    <form action="" method="post">
                        <div class="old-news-date">
                            <input type="text" name="from" placeholder="From Date" required="">
                            <input type="text" name="" placeholder="To Date">
                        </div>
                        <div class="old-date-button">
                            <input type="submit" value="search ">
                        </div>
                    </form>
                    <!-- news -->
                    <br><br><br><br><br>
                    @php
                        $websites = \Illuminate\Support\Facades\DB::table('websites')->get();
                    @endphp
                    @if(Session()->get('lang') == 'English')
                        <div class="cetagory-title-04"> Important Website</div>
                    @else
                        <div class="cetagory-title-04"> Trang web quan trong</div>
                    @endif
                    @foreach($websites as $website)
                        <div class="">
                            <div class="news-title-02">
                                <h4 class="heading-03"><a href="{{$website->website_link}}" target="_blank"><i
                                            class="fa fa-check"
                                            aria-hidden="true"></i>
                                        {{$website->website_name}} </a></h4>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="sidebar-add">
                        <img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt=""/>
                    </div>
                </div>
            </div><!-- /.add-close -->

        </div>
        </div>
    </section><!-- /.3rd-news-section-close -->


    <!-- gallery-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-7">
                    <div class="gallery_cetagory-title"> Photo Gallery</div>

                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="photo_screen">
                                <div class="myPhotos" style="width:100%">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Avatar">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="photo_list_bg">

                                <div class="photo_img photo_border active">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image"
                                         onclick="currentDiv(1)">
                                    <div class="heading-03">
                                        Casting of Israeli actress as Cleopatra sparks anger
                                    </div>
                                </div>

                                <div class="photo_img photo_border">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image"
                                         onclick="currentDiv(1)">
                                    <div class="heading-03">
                                        Casting of Israeli actress as Cleopatra sparks anger
                                    </div>
                                </div>

                                <div class="photo_img photo_border">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image"
                                         onclick="currentDiv(1)">
                                    <div class="heading-03">
                                        Casting of Israeli actress as Cleopatra sparks anger
                                    </div>
                                </div>

                                <div class="photo_img photo_border">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image"
                                         onclick="currentDiv(1)">
                                    <div class="heading-03">
                                        Casting of Israeli actress as Cleopatra sparks anger
                                    </div>
                                </div>

                                <div class="photo_img photo_border">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image"
                                         onclick="currentDiv(1)">
                                    <div class="heading-03">
                                        Casting of Israeli actress as Cleopatra sparks anger
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                    <script>
                        var slideIndex = 1;
                        showDivs(slideIndex);

                        function plusDivs(n) {
                            showDivs(slideIndex += n);
                        }

                        function currentDiv(n) {
                            showDivs(slideIndex = n);
                        }

                        function showDivs(n) {
                            var i;
                            var x = document.getElementsByClassName("myPhotos");
                            var dots = document.getElementsByClassName("demo");
                            if (n > x.length) {
                                slideIndex = 1
                            }
                            if (n < 1) {
                                slideIndex = x.length
                            }
                            for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                            }
                            x[slideIndex - 1].style.display = "block";
                            dots[slideIndex - 1].className += " w3-opacity-off";
                        }
                    </script>

                    <!--=======================================
                        Video Gallery clickable  jquary  close
                    =========================================-->

                </div>
                <div class="col-md-4 col-sm-5">
                    <div class="gallery_cetagory-title"> photo Gallery</div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                        <iframe width="853" height="480"
                                                src="https://www.youtube.com/embed/AWM8164ksVY?list=RDAWM8164ksVY"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="gallery_sec owl-carousel">

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
                                            Kumar Sanu tests positive for coronavirus
                                        </div>
                                    </div>
                                </div>

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
                                            Kumar Sanu tests positive for coronavirus
                                        </div>
                                    </div>
                                </div>

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
                                            Kumar Sanu tests positive for coronavirus
                                        </div>
                                    </div>
                                </div>

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
                                            Kumar Sanu tests positive for coronavirus
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                            showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                            showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                            var i;
                            var x = document.getElementsByClassName("myVideos");
                            var dots = document.getElementsByClassName("demo");
                            if (n > x.length) {
                                slideIndex = 1
                            }
                            if (n < 1) {
                                slideIndex = x.length
                            }
                            for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                            }
                            x[slideIndex - 1].style.display = "block";
                            dots[slideIndex - 1].className += " w3-opacity-off";
                        }
                    </script>

                </div>
            </div>
        </div>
    </section><!-- /.gallery-section-close -->
@endsection
