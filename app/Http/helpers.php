<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: helpers.php,v 1.0 2015/06/22 02:26 htien Exp $
 */

/**
 * @param bool $more_entropy
 *
 * @return string
 */
function uniqid_base36($more_entropy = FALSE)
{
  $s = uniqid('', $more_entropy);
  if (! $more_entropy) {
    return base_convert($s, 16, 36);
  }

  $hex = substr($s, 0, 13);
  $dec = $s[13] . substr($s, 15); // skip the dot
  return base_convert($hex, 16, 36) . base_convert($dec, 10, 36);
}