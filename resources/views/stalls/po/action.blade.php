<div class="btn-group btn-group-xs" role="group" aria-label="Basic example">
    @if($po->payment_status != 'confirmed')
        @if(is_midwife())
            <a class="btn btn-primary" href="{{route('stalls.po.confirm', [$po->id])}}"> Confirm</a>
        @endif
    @endif
    @if(is_administrative() && $po->payment_status == 'confirmed' && !$po->received_payment)
        <a class="btn btn-warning" href="{{route('stalls.po.confirm_received', [$po->id])}}"> Received Payment</a>
    @endif
    <a class="btn btn-info " href="{{route('stalls.po.show', $po->id)}}">
        <i class="fa fa-eye"></i> Show
    </a>
</div>
