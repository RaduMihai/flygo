<?php

class ErrorHandler
{
    /**
     * @param Throwable $exception
     * @return void
     */
    public static function handleException(Throwable $exception): void
    {
        $code = $exception->getCode();
        http_response_code($code);

        echo json_encode([
            "code" => $code,
            "message" => $exception->getMessage(),
        ]);
        // @toDo also some error logging should be done
    }
}