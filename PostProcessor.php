<?php

require_once 'Post.php';
require_once 'IProcess.php';

/**
 * @author  Alaa Attya  <alaa.attya91@gmail.com>
 */
class PostProcessor implements IProcess {

    /**
     * @var     Post
     * @access  private
     */
    private $_post;

    /**
     *
     */
    public function __construct($row) {
        $this->_post = new Post($row);
    }

    /**
     * Process a new csv row
     * If the post already exists, update it else inert the post
     */
    public function process() {
        if($this->_post->is_exist()) {
            $this->_post->update();
        } else {
            $this->_post->insert();
        }
    }
}