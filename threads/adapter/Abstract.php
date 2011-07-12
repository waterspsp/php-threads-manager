<?php

namespace Thread;

require_once 'Interface.php';

abstract class AdapterAbstract implements \Thread\AdapterInterface
{
    public function getThreadResponse($thread)
    {
        $response = '';
        if (($response = fread($thread, 64)) !== '' || feof($thread)) {
            // считываем ответ до конца
            while (!feof($thread)) {
                $response .= fread($thread, 1024);
            }
            return $response;
        }
        return false;
    }
}