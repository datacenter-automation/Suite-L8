<?php

namespace App\Libraries\NetworkingTools;

trait PropertyTrait
{

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get(string $name): mixed
    {
        $method = 'get' . ucfirst($name);

        if (! method_exists($this, $method)) {
            trigger_error('Undefined property');

            return null;
        }

        return $this->$method();
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function __set(string $name, mixed $value): void
    {
        $method = 'set' . ucfirst($name);

        if (! method_exists($this, $method)) {
            trigger_error('Undefined property');
        }

        $this->$method($value);
    }
}
