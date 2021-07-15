@php
    $latestPost = \Illuminate\Support\Facades\DB::table('posts')->orderByDesc('posts.id')->limit(5)->get();
    $popularPost = \Illuminate\Support\Facades\DB::table('posts')->inRandomOrder()->limit(5)->get();
    $highestPost = \Illuminate\Support\Facades\DB::table('posts')->orderBy('id', 'asc')->limit(5)->get();
@endphp
<div class="col-md-3 col-sm-3">
    <div class="tab-header">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified" role="tablist">
            @if(Session()->get('lang') == 'English')
                <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab"
                                                          data-toggle="tab"
                                                          aria-expanded="false">Latest</a>
                </li>
                <li role="presentation"><a href="#tab22" aria-controls="tab22" role="tab"
                                           data-toggle="tab"
                                           aria-expanded="true">Popular</a></li>
                <li role="presentation"><a href="#tab23" aria-controls="tab23" role="tab"
                                           data-toggle="tab"
                                           aria-expanded="true">Highest</a></li>
            @else
                <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab"
                                                          data-toggle="tab"
                                                          aria-expanded="false">Mới</a>
                </li>
                <li role="presentation"><a href="#tab22" aria-controls="tab22" role="tab"
                                           data-toggle="tab"
                                           aria-expanded="true">Phổ biến</a></li>
                <li role="presentation"><a href="#tab23" aria-controls="tab23" role="tab"
                                           data-toggle="tab"
                                           aria-expanded="true">Tin hot</a></li>
            @endif

        </ul>

        <!-- Tab panes -->
        <div class="tab-content ">
            <div role="tabpanel" class="tab-pane in active" id="tab21">
                <div class="news-titletab">
                    <div class="news-title-02">
                        @foreach($latestPost as $latest)
                            @if(Session()->get('lang') == 'English')
                                <h4 class="heading-03"><i
                                        class="fa fa-check"
                                        aria-hidden="true"></i><a
                                        href="{{\Illuminate\Support\Facades\URL::to('/view/post', $latest->id)}}">{{$latest->title_en}}</a>
                                </h4>
                            @else
                                <h4 class="heading-03"><i
                                        class="fa fa-check"
                                        aria-hidden="true"></i><a
                                        href="{{\Illuminate\Support\Facades\URL::to('/view/post', $latest->id)}}">{{$latest->title_vie}}</a>
                                </h4>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab22">
                <div class="news-titletab">
                    <div class="news-title-02">
                        @foreach($popularPost as $popular)
                            @if(Session()->get('lang') == 'English')
                                <h4 class="heading-03"><i
                                        class="fa fa-check"
                                        aria-hidden="true"></i><a
                                        href="{{\Illuminate\Support\Facades\URL::to('/view/post', $popular->id)}}">{{$popular->title_en}}</a>
                                </h4>
                            @else
                                <h4 class="heading-03"><i
                                        class="fa fa-check"
                                        aria-hidden="true"></i><a
                                        href="{{\Illuminate\Support\Facades\URL::to('/view/post', $popular->id)}}">{{$popular->title_vie}}</a>
                                </h4>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab23">
                <div class="news-titletab">
                    <div class="news-title-02">
                        @foreach($highestPost as $highest)
                            @if(Session()->get('lang') == 'English')
                                <h4 class="heading-03"><i
                                        class="fa fa-check"
                                        aria-hidden="true"></i><a
                                        href="{{\Illuminate\Support\Facades\URL::to('/view/post', $highest->id)}}">{{$highest->title_en}}</a>
                                </h4>
                            @else
                                <h4 class="heading-03"><i
                                        class="fa fa-check"
                                        aria-hidden="true"></i><a
                                        href="{{\Illuminate\Support\Facades\URL::to('/view/post', $highest->id)}}">{{$highest->title_vie}}</a>
                                </h4>
                            @endif
                        @endforeach
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
