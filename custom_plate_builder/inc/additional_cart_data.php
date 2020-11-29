<?php
function ttp_cart_item_name_for_installments($title = null, $cart_item = null, $cart_item_key = null) {
    if (isset($cart_item['installment_purchase']) &&
        'yes' == $cart_item['installment_purchase']) {

        setlocale(LC_MONETARY, 'en_US');
        $nInstallments     = count($cart_item['installments']);
        $installmentPrice  = round(floatval($cart_item['installment_price']), 2);

        echo sprintf("<p>%s</p><p><em>Installment 1 of %d</em></p><p><em>%d remaining installments of $%s</em></p>",
        $title,
        $nInstallments,
        $nInstallments - 1,
        money_format('%i', $installmentPrice));
    }  else {
        echo sprintf("</p>%s</p>", $title);
    }
}