jQuery(function ($) {
    jQuery('form[name="cadastro-simples-register"]').on('submit', function (e) {
        e.preventDefault();
        const form = $(this);
        jQuery.post(form.attr('action'), form.serialize(), function (response) {
            alert(response.msg);
            form.get(0).reset();
        })
        .fail(function (err) {
            console.warn("error", err);
        });
    });
});