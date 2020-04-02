<?php

namespace App\Http\Requests;

trait IncludeRequestParams
{
    /**
     * Get as an array all the data included in the request body.
     *
     * @param array $keys
     * @return void
     */
    public function all($keys = null)
    {
        $data = parent::all();

        if (isset($this->routeParameters)) {
            foreach ($this->routeParameters as $key => $routeParam) {
                $data[$key] = $this->route($routeParam);
            }
        }

        if (isset($this->queryParameters)) {
            foreach ($this->queryParameters as $key => $queryParam) {
                $data[$key] = $this->query($queryParam);
            }
        }

        return $data;
    }
}
