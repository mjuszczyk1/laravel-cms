@if(!empty($blocks['footer']))
    <div class="page-footer" style="margin-top: 100px; border-top: 1px solid lightgray;">
        @foreach($blocks['footer'] as $block)
            <div class="block-{{$block->id}}">
                <p>{!!nl2br(e($block->body))!!}</p>
            </div>
        @endforeach
    </div>
@endif