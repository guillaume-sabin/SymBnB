'use strict';

$('#add-image').click(function () {
    // Je récupère le numéro des futur champs que je vais créer
    // + transforme le résultat de l'éxpression en nombre
    const index = +$('#widgets-counter').val();
    console.log(index);

    // Je récupère le prototype (symfony) des entry
    const template = $('#annonce_images').data('prototype').replace(/__name__/g, index);

    // J'injecte ce code au sein de la div
    $('#annonce_images').append(template);

    $('#widgets-counter').val(index + 1)

    // Je gère le boutton supprimer
    handleDeleteButtons();
});

function handleDeleteButtons() {
    $('button[data-action="delete"]').click(function () {
        const target = this.dataset.target;
        $(target).remove();
    })
}

function updateCounter() {
    const count = +$('#annonce_images div.form-group').length;

    $('#widgets-counter').val(count);
}

updateCounter();
handleDeleteButtons();