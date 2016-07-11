<?php

class Controller_Test extends Controller_Rest
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
