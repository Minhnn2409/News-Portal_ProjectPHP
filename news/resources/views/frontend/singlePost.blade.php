@extends('main.home_master')
@section('contents')
    <!-- top-add-start -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="top-add"><img src="{{asset('assets/img/top-ad.jpg')}}" alt=""/></div>
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

    <!-- single-page-start -->
    <section class="single-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        @if(Session()->get('lang') == 'English')
                            <li><a href="#">{{$singlePost->category_en}}</a></li>
                            <li><a href="#">{{$singlePost->subcategory_en}}</a></li>
                        @else
                            <li><a href="#">{{$singlePost->category_vie}}</a></li>
                            <li><a href="#">{{$singlePost->subcategory_vie}}</a></li>
                        @endif

                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <header class="headline-header margin-bottom-10">
                        @if(Session()->get('lang') == 'English')
                            <h1 class="headline">{{$singlePost->title_en}}</h1>

                        @else
                            <h1 class="headline">{{$singlePost->title_vie}}</h1>

                        @endif
                    </header>


                    <div class="article-info margin-bottom-20">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <ul class="list-inline">


                                    <li>{{$singlePost->name}}</li>
                                    <li><i class="fa fa-clock-o"></i> {{$singlePost->post_date}}</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ******** -->
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="single-news">
                        <img src="{{asset($singlePost->image)}}" alt="Anh single Post"/>
                        @if(Session()->get('lang') == 'English')
                            <h4 class="caption"> {{$singlePost->title_en}} </h4>
                        @else
                            <h4 class="caption"> {{$singlePost->title_vie}} </h4>
                        @endif
                        @if(Session()->get('lang') == 'English')
                            {!! $singlePost->details_en !!}
                        @else
                            {!! $singlePost->details_vie !!}
                        @endif
                    </div>
                    <!-- ********* -->
                    <div class="row">
                        @if(Session()->get('lang') == 'English')
                            <div class="col-md-12"><h2 class="heading">Related News</h2></div>
                        @else
                            <div class="col-md-12"><h2 class="heading">Tin tức liên quan</h2></div>
                        @endif
                        <div class="col-md-4 col-sm-4">
                            <div class="top-news sng-border-btm">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">e-CAB shows how to help people during crisis</a></h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="top-news sng-border-btm">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">e-CAB shows how to help people during crisis</a></h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="top-news sng-border-btm">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">e-CAB shows how to help people during crisis</a></h4>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="top-news">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">e-CAB shows how to help people during crisis</a></h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="top-news">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">e-CAB shows how to help people during crisis</a></h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="top-news">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">e-CAB shows how to help people during crisis</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add"><img src="assets/img/add_01.jpg" alt=""/></div>
                        </div>
                    </div><!-- /.add-close -->
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
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab22">
                                <div class="news-titletab">
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#"> educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#"> educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#"> ducational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#"> educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#"> educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#"> educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#"> educational institutions</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab23">
                                <div class="news-titletab">
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                    <div class="news-title-02">
                                        <h4 class="heading-03"><a href="#">Shutdown of educational institutions</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add"><img src="assets/img/add_01.jpg" alt=""/></div>
                        </div>
                    </div><!-- /.add-close -->
                </div>
            </div>
        </div>
    </section>
@endsection
