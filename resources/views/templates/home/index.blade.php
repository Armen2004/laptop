@if(DB::table('contents')->where('page_id', 1)->first())
    {!! html_entity_decode(DB::table('contents')->where('page_id', 1)->first()->content) !!}
@else
    @include('index')
@endif