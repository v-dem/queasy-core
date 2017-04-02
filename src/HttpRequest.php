<?php

namespace queasy;

class HttpRequest
{

    private $get;
    private $post;
    private $files;
    private $session;

    public function __construct(array $get, array $post, array $files, array $session)
    {
        $this->get = $this->trimInput($get);
        $this->post = $this->trimInput($post);
        $this->files = $files;
        $this->session = $session;
    }

    public function get($name = null)
    {
        if (is_null($name)) {
            return $get;
        } else {
            return isset($this->get[$name])? $this->get[$name]: null;
        }
    }

    public function post($name = null)
    {
        if (is_null($name)) {
            return $this->post;
        } else {
            return isset($this->post[$name])? $this->post[$name]: null;
        }
    }

    public function files($name = null)
    {
        if (is_null($name)) {
            return $this->files;
        } else {
            return isset($this->files[$name])? $this->files[$name]: null;
        }
    }

    public function session($name = null)
    {
        if (is_null($name)) {
            return $this->session;
        } else {
            return isset($this->session[$name])? $this->session[$name]: null;
        }
    }

    private function trimInput(array $input)
    {
        $result = array();
        foreach ($input as $inputField => $inputValue) {
            $result[$inputField] = is_string($inputValue)? trim($inputValue): $inputValue;
        }

        return $result;
    }

}
