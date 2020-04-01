<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    static $statuses = [
        'continue' => 100,
        'switchingProtocols' => 101,
        'ok' => 200,
        'created' => 201,
        'accepted' => 202,
        'nonAuthoritativeInformation' => 203,
        'noContent' => 204,
        'resetContent' => 205,
        'partialContent' => 206,
        'multipleChoices' => 300,
        'movedPermanently' => 301,
        'found' => 302,
        'seeOther' => 303,
        'notModified' => 304,
        'useProxy' => 305,
        'temporaryRedirect' => 307,
        'badRequest' => 400,
        'unauthorized' => 401,
        'paymentRequired' => 402,
        'forbidden' => 403,
        'notFound' => 404,
        'methodNotAllowed' => 405,
        'notAcceptable' => 406,
        'proxyAuthenticationRequired' => 407,
        'requestTimeout' => 408,
        'conflict' => 409,
        'gone' => 410,
        'lengthRequired' => 411,
        'preconditionFailed' => 412,
        'requestEntityTooLarge' => 413,
        'requestUriTooLong' => 414,
        'unsupportedMediaType' => 415,
        'requestedRangeNotSatisfiable' => 416,
        'expectationFailed' => 417,
        'unprocessableEntity' => 422,
        'tooManyRequests' => 429,
        'internalServerError' => 500,
        'notImplemented' => 501,
        'badGateway' => 502,
        'serviceUnavailable' => 503,
        'gatewayTimeout' => 504,
        'httpVersionNotSupported' => 505
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach (self::$statuses as $status => $code) {
            /**
             * Order of fields params.
             * 
             * @param string $message
             * @param array|null $data
             * @param boolean $status
             * @param boolean $error
             */
            response()->macro($status, function (...$fields) use ($code) {
                return ResponseMacroServiceProvider::registerResponseMacro($code, ...$fields);
            });
        }

        response()->macro('custom', function ($code, ...$fields) {
            return ResponseMacroServiceProvider::registerResponseMacro($code, ...$fields);
        });
    }

    /**
     * Register macro implementation on the response herlper.
     *
     * @param int $code
     * @param string $message
     * @param array $data
     * @param boolean $status
     * @param boolean $error
     * @return void
     */
    public static function registerResponseMacro(
        int $code,
        string $message = '',
        $data = null,
        bool $status = null,
        bool $error = false
    ) {
        $response = ['status'  => $status ?? ($code >= 200 && $code < 300)];
        $response = empty($message) ? $response : array_merge($response, compact('message'));
        $response = ($error == true)
            ? (is_null($data) ? $response : array_merge($response, ['error' => $data]))
            : (is_null($data) ? $response : array_merge($response, compact('data')));

        return response()->make($response, $code);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
