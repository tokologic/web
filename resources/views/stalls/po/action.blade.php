<div class="btn-group btn-group-xs" role="group" aria-label="Basic example">
    @if($po->payment_status != 'confirmed')
        <a class="btn btn-primary" href="{{route('stalls.po.confirm', [$po->id])}}"> Confirm</a>
    @endif
    <a class="btn btn-info " href="{{route('stalls.po.show', $po->id)}}">
        <i class="fa fa-eye"></i> Show
    </a>
</div>
