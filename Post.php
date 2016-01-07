<?php


/**
 * @author  Alaa Atty <alaa.attya91@gmail.com>
 */
class Post {

    /**
     * @var     int
     * @access  private
     */
    private $_vendor_id;

    /**
     * @var     string
     * @access  private
     */
    private $_title;

    /**
     * @var     string
     * @access  private
     */
    private $_content;

    /**
     * @var     string
     * @access  private
     */
    private $_ip_address;

    /**
     * @var     string
     * @access  private
     */
    private $_approved;

    /**
     *
     */
    public function __construct($post_array) {
        // TODO validate if each key exists

        // Parsing csv row (post)
        // TODO create a separate post parser
        $this->_vendor_id = $post_array[0];
        $this->_title = $post_array[1];
        $this->_content = $post_array[2];
        $this->_ip_address = $post_array[3];

        // As the approval column is passed as string
        if($post_array['4'] == 'true') {
            $this->_approved = true;
        } else {
            $this->_approved = false;
        }
    }

    public function insert() {
        // TODO insert new post


        if($this->_approved) {
            // TODO if approved save and publish

        } else {
            // TODO else save as draft
        }

        // Log the new inserted row
        $now_date = date('Y-m-d h:i:s');
        $msg = sprintf(Log::ROW_INSERTED, $this->_vendor_id, $now_date);
    }

    public function update() {
        $now_date = date('Y-m-d h:i:s');
        $msg = sprintf(Log::ROW_UPDATED, $this->_vendor_id, $now_date);
        LogImporter::insert_new_log($msg, $now_date);
    }

    public function is_exist() {
        return false;
    }
}