<?php

namespace App\Contracts;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class SlackTask
{
    public $title;

    public $message;

    public function __construct($title, $message)
    {
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the plain content of the job.
     *
     * @return string
     */
    public function plainContent(): string
    {
        return "{$this->title}\n\n{$this->message}";
    }

    /**
     * Get array representation
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'title' => $this->title,
            'message' => $this->message
        ];
    }
}
