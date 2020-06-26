

@if (count($breadcrumbs))
<ul class="breadcrumb">
    @foreach ($breadcrumbs as $breadcrumb)
        @if ($breadcrumb->url && !$loop->last)
            <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}"><strong>{{ $breadcrumb->title }}</strong></a></li>
        @else
            <li class="breadcrumb-item active"><strong>{{ $breadcrumb->title }}</strong></li>
        @endif
    @endforeach
</ul>
@endif  

