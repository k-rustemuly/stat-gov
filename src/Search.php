<?php

namespace Stat\Gov;

/**
 * Class Search
 *
 * Класс для работы с API stat.gov.kz
 *
 * @package Stat\Gov
 * @author Osmanov Kuanysh <developerandroidkz@gmail.com>
 * @link https://stat.gov.kz/juridical/api
 */
class Api
{
    protected $host = '';
    protected $timeout = 60;

    /**
     * Api constructor.
     *
     * @param string $statHost Хост для подключения к stat.gov.kz
     * @param int $iTimeoutSeconds Таймаут соединения
     */
    public function __construct($statHost = 'https://stat.gov.kz/api/juridical/counter/api/', $iTimeoutSeconds = 60)
    {
        $this->host    = $statHost;
        $this->timeout = $iTimeoutSeconds;
    }

    /**
     * Возвращает информацию 
     *
     * @param string $bin ИИН или БИН
     * @param string $lang Язык ru/kk/en
     * @return ApiInfo Информация о ИП или Организации
     * @throws ApiErrorException Произошла ошибка со стороны API. Не найдена информация по ИИН или БИН.
     * @throws CurlException Произошла ошибка со стороны cURL
     * @throws NCANodeException Не удалось проинциализорвать cURL
     */
    public function search($bin, $lang = "ru")
    {
        $request["bin"] = $bin;
        $request["lang"] = $lang;
        $result = $this->request($request);
        return new ApiInfo($result['result']);
    }

    protected function request(array $requestJSON)
    {
        $ch = curl_init($this->host);

        if ($ch == false) {
            throw new CurlException(curl_error($ch), curl_errno($ch));
        }

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'GET',
            CURLOPT_TIMEOUT        => $this->timeout
        ]);

        $result = curl_exec($ch);

        if (curl_errno($ch) !== CURLE_OK) {
            throw new CurlException(curl_error($ch), curl_errno($ch));
        }

        curl_close($ch);

        $resultJson = json_decode($result, true);

        if (!$resultJson) {
            throw new ApiErrorException('Invalid response given: ' . var_export($result, true), json_last_error());
        }

        if (!$resultJson['success']) {
            throw new ApiErrorException('Not found by IIN or BIN');
        }

        return $resultJson["obj"];
    }
}