function create(route) {

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
    let $obj = $(obj);
    bootbox.confirm({
        // title: "Destroy planet?",
        message: "Do you want to delete this user?",
        callback: function (result) {
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: $obj.data('route'),
                    data: {
                        _token: $obj.data('token')
                    },
                    success: function () {
                        window.LaravelDataTables[$obj.data('table')].ajax.reload();
                    },
                    error: function (r) {

                    }
                });

            }
        }
    })
}
