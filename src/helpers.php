<?php

if (!function_exists('strcut')) {
    /**
     * @param $file
     * @return string
     */
    function strcut(string &$line, int $length, int $begin = 0)
    {
        $word = ltrim(substr($line, $begin, $length));
        $line = substr($line, $length);

        $encode = mb_detect_encoding($word, "ASCII, ISO-8859-1, UTF-8");

        if ($encode == 'UTF-8') {
            return $word;
        } else if (!$encode) {
            return utf8_encode($word);
        }

        return iconv($encode, 'UTF-8', $word);
    }
}

function mb_str_pad ($input, $pad_length, $pad_string, $pad_style, $encoding="UTF-8") {
   return str_pad($input, strlen($input)-mb_strlen($input,$encoding)+$pad_length, $pad_string, $pad_style);
}
