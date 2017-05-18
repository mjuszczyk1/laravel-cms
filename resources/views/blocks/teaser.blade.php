@if(!empty($type))
    @if($type == 'main')
        <div class="block-teaser">
            <div class="block-teaser-header">
                <h{{!empty($headlineSize) ? $headlineSize : 2}}><a href="{{$block->url()}}">{{$block->title}}</a></h2>
                @if (!empty($subtitle) && !empty($block->sub_title))
                    <h3>{{$block->sub_title}}</h3>
                @endif
                @if (!empty($byline))
                    <aside clas="byline">
                        <p>
                            Created by {{Auth::user($block->author_id)->name}} on {{$block->created_at->format('F j, Y \a\t g:ia')}}
                            @if ($block->updated_at != $block->created_at)
                                <span class="text-info">updated {{$block->updated_at->format('F j, Y \a\t g:ia')}}</span>
                            @endif
                        </p>
                    </aside>
                @endif
            </div>
            <div class="block-teaser-body">
                @if (!empty($fullBody))
                    <p>{{$block->body}}</p>
                @else
                    <p>{{$block->abstract}}</p>
                @endif
            </div>
            <hr>
        </div>
    @endif
@else 
    <h1 class="text-danger">Specifiy a layout type!</h1>
@endif