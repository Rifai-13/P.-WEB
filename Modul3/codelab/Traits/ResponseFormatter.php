<?php
namespace Traits;

trait ResponseFormatter
{
    public function ResponseFormatter($code, $message, $data = null)
    {
        // Menggunakan json_encode dengan opsi JSON_PRETTY_PRINT
        return json_encode([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], JSON_PRETTY_PRINT);
    }

    public function ResponseFormatterHtml($code, $message, $data = null)
    {
        // Siapkan HTML
        $html = "<html><head><meta charset='utf-8'><title>Response</title></head><body>";
        // $html .= "<h1>Response</h1>";
        $html .= "<pre>" . $this->ResponseFormatter($code, $message, $data) . "</pre>"; // Menampilkan JSON yang sudah diformat

        $html .= "</body></html>";
        return $html;
    }
}
