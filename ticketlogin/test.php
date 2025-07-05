<?php
function generateBarcode($code) {
    $width = 2; // Width of each bar
    $height = 50; // Height of the barcode
    $padding = 10; // Padding around the barcode

    // Barcode patterns for Code 128 (subset B)
    $patterns = [
        '0' => '11011001100', '1' => '11001101100', '2' => '11001100110',
        '3' => '10010011000', '4' => '10010001100', '5' => '10001001100',
        '6' => '10011001000', '7' => '10011000100', '8' => '10001100100',
        '9' => '11001001000', 'A' => '11001000100', 'B' => '11000100100',
        'C' => '10110011100', 'D' => '10011011100', 'E' => '10011001110',
        'F' => '10111001100', 'G' => '10011101100', 'H' => '10011100110',
        'I' => '11001110010', 'J' => '11001011100', 'K' => '11001001110',
        'L' => '11011100100', 'M' => '11001110100', 'N' => '11101101110',
        'O' => '11101001100', 'P' => '11100101100', 'Q' => '11100100110',
        'R' => '11101100100', 'S' => '11100110100', 'T' => '11100110010',
        'U' => '11011011000', 'V' => '11011000110', 'W' => '11000110110',
        'X' => '10100011000', 'Y' => '10001011000', 'Z' => '10001000110',
        'a' => '10110001000', 'b' => '10001101000', 'c' => '10001100010',
        'd' => '11010001000', 'e' => '11000101000', 'f' => '11000100010',
        'g' => '10110111000', 'h' => '10110001110', 'i' => '10001101110',
        'j' => '10111011000', 'k' => '10111000110', 'l' => '10001110110',
        'm' => '11101110110', 'n' => '11010001110', 'o' => '11000101110',
        'p' => '11011101000', 'q' => '11011100010', 'r' => '11011101110',
        's' => '11101011000', 't' => '11101000110', 'u' => '11100010110',
        'v' => '11101101000', 'w' => '11101100010', 'x' => '11100011010',
        'y' => '11101111010', 'z' => '11001000010', ' ' => '10100110000',
        '!' => '10100001100', '"' => '10010110000', '#' => '10010000110',
        '$' => '10000101100', '%' => '10000100110', '&' => '10110010000',
        '\'' => '10110000100', '(' => '10011010000', ')' => '10011000010',
        '*' => '10000110100', '+' => '10000110010', ',' => '11000010010',
        '-' => '11001010000', '.' => '11110111010', '/' => '11000010100',
        ':' => '10001111010', ';' => '10100111100', '<' => '10010111100',
        '=' => '10010011110', '>' => '10111100100', '?' => '10011110100',
        '@' => '10011110010', 'A' => '11110100100', 'B' => '11110010100',
        'C' => '11110010010', 'D' => '11011011110', 'E' => '11011110110',
        'F' => '11110110110', 'G' => '10101111000', 'H' => '10100011110',
        'I' => '10001011110', 'J' => '10111101000', 'K' => '10111100010',
        'L' => '11110101000', 'M' => '11110100010', 'N' => '10111011110',
        'O' => '10111101110', 'P' => '11101011110', 'Q' => '11110101110'
    ];

    // Start and Stop patterns for Code 128 B
    $start = '11010010000';
    $stop = '1100011101011';

    // Start with the start pattern
    $barcodePattern = $start;

    // Encode each character in the code
    for ($i = 0; $i < strlen($code); $i++) {
        $char = $code[$i];
        $barcodePattern .= $patterns[$char] ?? '';
    }

    // Add the stop pattern
    $barcodePattern .= $stop;

    // Calculate the total width of the barcode
    $barcodeWidth = strlen($barcodePattern) * $width;

    // Create a blank image
    $image = imagecreatetruecolor($barcodeWidth + $padding * 2, $height + $padding * 2);

    // Allocate colors
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);

    // Fill the image with white
    imagefilledrectangle($image, 0, 0, $barcodeWidth + $padding * 2, $height + $padding * 2, $white);

    // Draw the barcode
    $x = $padding;
    for ($i = 0; $i < strlen($barcodePattern); $i++) {
        $color = $barcodePattern[$i] === '1' ? $black : $white;
        imagefilledrectangle($image, $x, $padding, $x + $width - 1, $height + $padding - 1, $color);
        $x += $width;
    }

    // Output the image as a PNG
    header('Content-Type: image/png');
    imagepng($image);
    imagedestroy($image);
}

// Call the function with the code you want to generate
generateBarcode('HELLO123');
?>
