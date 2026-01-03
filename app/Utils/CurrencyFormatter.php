<?php

namespace App\Utils;

use NumberFormatter;

class CurrencyFormatter {
   public static function format(int $price) : string
   {
      $formatter = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
      $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
      return $formatter->formatCurrency($price, 'IDR');
   }
}