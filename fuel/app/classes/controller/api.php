<?php

class Controller_Api extends Controller_Rest
{
    public function get_list()
    {
        $contents = array();

        # TODO: POSTデータDBから読み込み
        $test1 = array();
        $test1['name'] = '大石碧';
        $test1['iconUrl'] = 'https://pbs.twimg.com/profile_images/755413122450546688/Xf1Uejh9.jpg';
        $test1['title'] = '好きな男性のタイプは？';
        $test1['text'] = '秘密';
        $test1['category'] = 1;
        $test1['createdAt'] = '2016年7月23日';
        $test2 = array();
        $test2['name'] = '松橋彩美';
        $test2['iconUrl'] = 'https://pbs.twimg.com/profile_images/709020416518463488/_zHibzhq.jpg';
        $test2['title'] = '好きな男性のタイプは？';
        $test2['text'] = 'あああ
おおお
いいい';
        $test2['category'] = 1;
        $test2['createdAt'] = '2016年7月23日';
        $test3 = array();
        $test3['name'] = '大石碧';
        $test3['iconUrl'] = 'https://pbs.twimg.com/profile_images/755413122450546688/Xf1Uejh9.jpg';
        $test3['title'] = 'ツイッター投稿';
        $test3['text'] = 'ウェイになりたい！！';
        $test3['category'] = 2;
        $test3['createdAt'] = '2016年7月22日';
        $contents[0] = $test1;
        $contents[1] = $test2;
        $contents[2] = $test3;

        return $this->response(array(
            'contents' => array($contents),
        ));
    }

    public function get_cards()
    {
        $cards = array();
        $hoge = new Model_User();
        
        $post = Model_User::find(1);
        var_dump($post);

        $cards[] = "hoge";
        return $this->response(array(
            'contents' => array($cards),
        ));
    }
}
