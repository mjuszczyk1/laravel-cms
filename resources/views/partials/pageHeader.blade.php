@if(!empty($blocks['header']))
    <div class="page-header" style="margin-bottom: 100px; border-bottom: 1px solid lightgray;">
        @foreach($blocks['header'] as $block)
            <div class="block-{{$block->id}}">
                <p class="mb-0">{!!nl2br(e($block->body))!!}</p>
            </div>
        @endforeach
    </div>
@endif