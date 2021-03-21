<?php

function hex_to_rgb($hex)
{
    $hexCode = ltrim($hex, '#');

    if (strlen($hexCode) == 3) {
        $hexCode = $hexCode[0] . $hexCode[0] . $hexCode[1] . $hexCode[1] . $hexCode[2] . $hexCode[2];
    }

    return array_map('hexdec', str_split($hexCode, 2));
}


function rgb_to_hex($rgb)
{
    return '#' .
        implode('', array_map(function ($color) {
            return str_pad(dechex($color), 2, '0', STR_PAD_BOTH);
        }, $rgb));
}

/**
 * Increases or decreases the brightness of a color by a percentage of the current brightness.
 *
 * @param string $hexCode Supported formats: `#FFF`, `#FFFFFF`, `FFF`, `FFFFFF`
 * @param float $adjustPercent A number between -1 and 1. E.g. 0.3 = 30% lighter; -0.4 = 40% darker.
 *
 * @return  string
 */
function adjust_brightness($hexCode, $adjustPercent)
{
    $rgb = hex_to_rgb($hexCode);

    foreach ($rgb as & $color) {
        $adjustableLimit = $adjustPercent < 0 ? $color : 255 - $color;
        $adjustAmount = ceil($adjustableLimit * $adjustPercent);
        $color = str_pad(dechex($color + $adjustAmount), 2, '0', STR_PAD_LEFT);
    }

    return '#' . implode($rgb);
}


function invert_color($hexCode)
{
    $rgb = hex_to_rgb($hexCode);

    $inverted = array_map(function ($color) {
        return ($color < 128) ? 255 : 0;
    }, $rgb);

    return rgb_to_hex($inverted);
}
