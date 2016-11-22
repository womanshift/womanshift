<?php

class Controller_Api extends Controller_Rest
{
    public function get_cards($category_id=null)
    {
        header('Access-Control-Allow-Origin: *');

        $contents = array();
        $query = DB::select('answers.id',
            'answers.text',
            'councilors.location',
            'councilors.name',
            'councilors.nickname',
            'councilors.icon_url',
            'questions.title',
            array('categories.name', 'category'),
            'answers.created_at');
        $query->from('answers');
        $query->join('councilors', 'LEFT')->on('answers.councilor_id', '=', 'councilors.id');
        $query->join('questions', 'LEFT')->on('answers.question_id', '=', 'questions.id');
        $query->join('categories', 'LEFT')->on('questions.category_id', '=', 'categories.id');
        if ($category_id) $query->where('questions.category_id', $category_id);
        $query->order_by('answers.id', 'desc');
        $answers = $query->execute();

        foreach ($answers as $answer) {
            $contents[] = array(
                'id'       => $answer['id'],
                'location' => $answer['location'],
                'name'     => $answer['name'],
                'nickname' => $answer['nickname'],
                'icon_url' => $answer['icon_url'],
                'title'    => $answer['title'],
                'text'     => $answer['text'],
                'category' => $answer['category'],
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
              'catchphrase' => $councilor['catchphrase'],
              'emphasis' => $councilor['emphasis'],
              'twitter' => $councilor['twitter'],
              'facebook' => $councilor['facebook'],
              'link' => $councilor['link'],
              'icon_url' => $councilor['icon_url'],
              );
        }

        return $this->response(array(
            'contents' => $contents,
        ));
    }

    public function get_categories()
    {
        header('Access-Control-Allow-Origin: *');

        $contents = array();
        $categories = Model_Category::find('all', array('order_by' => array('id' => 'desc')));

        foreach ($categories as $category) {
          $contents[] = array(
              'id'       => $category['id'],
              'name'     => $category['name'],
              );
        }

        return $this->response(array(
            'contents' => $contents,
        ));
    }
}
