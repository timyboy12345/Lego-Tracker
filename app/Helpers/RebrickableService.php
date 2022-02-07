<?php


namespace App\Helpers;


use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class RebrickableService
{
    /**
     * Return set details from Rebrickable by set ID
     *
     * @param string $setId
     * @return RequestException|object
     */
    public static function getSet(string $setId)
    {
        $fullSetId = str_contains($setId, '-') ? $setId : "${setId}-1";

        $url = "https://rebrickable.com/api/v3/lego/sets/${fullSetId}/";
        $response = Http::withHeaders(['Authorization' => 'key c03bc865c8028d46157400cf605679c8'])->get($url);

        if ($response->status() !== 200) {
            return $response->toException();
        }

        return $response->object();
    }
}
