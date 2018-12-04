<form class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Total</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ rupiah(300000) }}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">PPN 10%</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ rupiah(300000 * 10/100) }}</p>
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Amount</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ rupiah(300000 + (300000 * 10/100)) }}</p>
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Cash</label>
        <div class="col-sm-10">
            <input type="number" class="form-control input-lg" >
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Change</label>
        <div class="col-sm-10">
            <p class="form-control-static">{{ rupiah(500000 - (300000 + (300000 * 10/100))) }}</p>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-md-4">
        <button type="button" class="btn btn-primary btn-block btn-lg">Save</button>
    </div>
    <div class="col-md-4">
        <a href="{{ route('sales.download', [34]) }}" class="btn btn-primary btn-block btn-lg">Print</a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('sales.download', [34]) }}" class="btn btn-primary btn-block btn-lg">Save and Print</a>
    </div>
</div>
