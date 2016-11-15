<?php

class Controller_Api extends Controller_Rest
{
    public function get_cards()
    {
        header('Access-Control-Allow-Origin: *');

        $contents = array();
        $answers = Model_Answer::find('all', array('order_by' => array('id' => 'desc')));

        foreach ($answers as $answer) {
            $councilor = Model_Councilor::find($answer->councilor_id);
            $question  = Model_Question::find($answer->question_id);
            $contents[] = array(
                'id'       => $answer['id'],
                'location' => $councilor['location'],
                'name'     => $councilor['name'],
                'nickname' => $councilor['nickname'],
                'icon_url' => $councilor['icon_url'],
                'title'    => $question['title'],
                'text'     => $answer['text'],
                "created_at" => $answer['created_at'],
                );
        }

        return $this->response(array(
            'contents' => $contents,
        ));
    }

    public function get_councilors()
    {
        header('Access-Control-Allow-Origin: *');

        $contents = array();
        $councilors = Model_Councilor::find('all', array('order_by' => array('id' => 'desc')));

        foreach ($councilors as $councilor) {
          $contents[] = array(
              'id'       => $councilor['id'],
              'location' => $councilor['location'],
              'name'     => $councilor['name'],
              'nickname' => $councilor['nickname'],
              'catchphrase' => 'キャッチフレーズ',
              'emphasis' => '力を入れていること',
              'icon_url' => $councilor['icon_url'],
              );
        }

        return $this->response(array(
            'contents' => $contents,
        ));
    }
}
