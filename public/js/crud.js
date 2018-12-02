function create(route) {
    $('.modal-footer').removeClass('hidden');

    $('#modal .btn-save').unbind('click');
    $('#modal .modal-body').html('Loading, please wait...');

    $.get(route, function (response) {
        $('#modal .modal-body').html(response);
    });

    $('#modal').modal('show');
}


function store(formId, dataTablesId) {
    let $form = $('#' + formId);
    let route = $form.attr('action');
    $.ajax({
        type: "POST",
        url: route,
        data: $form.serialize(),
        success: function () {
            window.LaravelDataTables[dataTablesId].ajax.reload();
            $('#modal').modal('hide');
        },
        error: function (r) {
            let errors = r.responseJSON.errors;

            let $formControl = $('#' + formId + ' .form-control');
            $formControl.removeClass('is-invalid');
            $formControl.removeClass('is-valid');

            for (let error in errors) {
                if (errors.hasOwnProperty(error)) {
                    let $error = $('#' + error);
                    $error.addClass('is-invalid');
                    $error.next('.invalid-feedback').text(errors[error].join());
                }
            }
        }
    });

    return false;
}

function edit(obj) {
    $('.modal-footer').removeClass('hidden');

    let $obj = $(obj);
    $('#modal .modal-body').html('Loading, please wait...');

    $.get($obj.data('route'), function (response) {
        $('#modal .modal-body').html(response);
    });

    $('#modal').modal('show');
}

function update(formId, dataTablesId) {
    let route = $('#' + formId).attr('action');

    $.ajax({
        type: "PUT",
        url: route,
        data: $('#' + formId).serialize(),
        success: function () {
            window.LaravelDataTables[dataTablesId].ajax.reload();
            $('#modal').modal('hide');
        },
        error: function (r) {
            let errors = r.responseJSON.errors;

            let $formControl = $('#' + formId + ' .form-control');
            $formControl.removeClass('is-invalid');
            $formControl.removeClass('is-valid');

            for (let error in errors) {
                if (errors.hasOwnProperty(error)) {
                    let $error = $('#' + error);
                    $error.addClass('is-invalid');
                    $error.next('.invalid-feedback').text(errors[error].join());
                }
            }
        }
    });

    return false;
}

function destroy(obj) {
    const alert = $(".alert");
    let $obj = $(obj);
    bootbox.confirm({
        // title: "Destroy planet?",
        message: "Anda ingin menghapus data ini?",
        callback: function (result) {
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: $obj.data('route'),
                    data: {
                        _token: $obj.data('token')
                    },
                    success: function (data) {
                        alert.removeClass('hidden');
                        if (data['error'])
                            alert.text(data['message']);
                        else
                            alert.text('Successfully destroy data');

                        window.LaravelDataTables[$obj.data('table')].ajax.reload();
                    },
                    error: function (r) {

                    }
                });

            }
        }
    })
}

function show(obj) {
    $('.modal-footer').addClass('hidden');

    let $obj = $(obj);
    $('#modal .modal-body').html('Loading, please wait...');

    $.get($obj.data('route'), function (response) {
        $('#modal .modal-body').html(response);
    });

    $('#modal').modal('show');
}
