@if (count($breadcrumbs))

    <ol class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ url('/') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>

        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li>
                    <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            @else
                <li class="active">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ol>

@endif
