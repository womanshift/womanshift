<?php

class Controller_Api extends Controller_Rest
{

    public function get_list()
    {
        return $this->response(array(
            'data' => array(
                0, 1, 2
            ),
        ));
    }
}
