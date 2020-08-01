<section class="status">
    @if($feed_items->count()>0)
    <ul class="list-unstyled">
        @foreach ($feed_items as $feed_item)
        @include('statuses.status',['user'=> $feed_item->user,'status'=>$feed_item])
        @endforeach
    </ul>
    @endif
</section>
{{ $feed_items->links() }}