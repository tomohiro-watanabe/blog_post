<?php
App::uses('AppModel', 'Model');

class Post extends AppModel {

    public $hasAndBelongsToMany = array(
        'Tag' => array(
            'className' => 'Tag',
            'joinTable' => 'posts_tags',
            'foreignKey' => 'post_id',
            'associationForeignKey' => 'tag_id'
        )
        );
    
    public $belongsTo = array(
        'Category' => array(
                'className' => 'Category',
                'foreignKey' => 'category_id'
        )
        );

    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
}
?>
