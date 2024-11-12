<?php
class Currency {
    const CURRENCY_API_URL = "https://cbu.uz/uz/arkhiv-kursov-valyut/json/";

    public function fetchRates() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::CURRENCY_API_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($output, true);

        $filteredRates = array_map(function($item) {
            return [
                'Ccy' => $item['Ccy'],
                'Rate' => $item['Rate']
            ];
        }, $data);


        $filteredRates[] = ['Ccy' => 'UZS', 'Rate' => 1];

        return $filteredRates;
    }
}
?>
