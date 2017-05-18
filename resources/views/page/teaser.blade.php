@if(!empty($type))
    @if($type == 'main')
        <div class="page-teaser">
            <div class="page-teaser-header">
                <h{{!empty($headlineSize) ? $headlineSize : 2}}><a href="{{$page->url()}}">{{$page->title}}</a></h2>
                @if (!empty($subtitle) && !empty($page->sub_title))
                    <h3>{{$page->sub_title}}</h3>
                @endif
                @if (!empty($byline))
                    <aside clas="byline">
                        <p>
                            Created by {{Auth::user($page->author_id)->name}} on {{$page->created_at->format('F j, Y \a\t g:ia')}}
                            @if ($page->updated_at != $page->created_at)
                                <span class="text-info">updated {{$page->updated_at->format('F j, Y \a\t g:ia')}}</span>
                            @endif
                        </p>
                    </aside>
                @endif
            </div>
            <div class="page-teaser-body">
                @if (!empty($fullBody))
                    <p>{{$page->body}}</p>
                @else
                    <p>{{$page->abstract}}</p>
                @endif
            </div>
            <hr>
        </div>
    @endif
@else 
    <h1 class="text-danger">Specifiy a layout type!</h1>
@endif