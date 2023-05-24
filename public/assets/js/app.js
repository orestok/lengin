$(function() {

    let cardNumber = $('#card-number');
    let cardNumberField = $('#card-number-field');
    let CVV = $("#cvv");
    let mastercard = $("#mastercard");
    let visa = $("#visa");

    cardNumber.payform('formatCardNumber');
    CVV.payform('formatCardCVC');

    cardNumber.keyup(function() {

        visa.removeClass('transparent');
        mastercard.removeClass('transparent');

        if ($.payform.validateCardNumber(cardNumber.val()) === false) {
            cardNumberField.addClass('has-error');
        } else {
            cardNumberField.removeClass('has-error');
            cardNumberField.addClass('has-success');
        }

        if ($.payform.parseCardType(cardNumber.val()) === 'visa') {
            mastercard.addClass('transparent');
        } else if ($.payform.parseCardType(cardNumber.val()) === 'mastercard') {
            visa.addClass('transparent');
        }
    });

});
