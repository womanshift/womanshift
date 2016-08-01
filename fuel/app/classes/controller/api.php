<?php

class Controller_Api extends Controller_Rest
{
    /**
     * アンケート回答状況返却API
     * @author Oishi Aoi
     * @return json 
     *
    */
    public function get_cards()
    {
	header('Access-Control-Allow-Origin: *');

        $cards = array();
        $answers = Model_Answer::find('all', array('order_by' => array('id' => 'desc')));

        foreach ($answers as $answer) {
            $councilor = Model_Councilor::find($answer->councilor_id);
            $question  = Model_Question::find($answer->question_id);
            $cards[] = array(
                "created_at" => $answer['created_at'],
                'icon_url' => $councilor['icon_url'],
                'id'       => $answer['id'],
                'location' => $councilor['location'],
                'name'     => $councilor['name'],
                'nickname' => $councilor['nickname'],
                'text'     => $answer['text'],
                'title'    => $question['title'],
                );
        }

        return $this->response(array(
            'contents' => $cards,
        ));
    }
}
