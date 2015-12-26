<?php

require_once 'nodeClass.php';

class ForumTopic extends Node {

    private $debugMessages;

    public function __construct() {
        parent::__construct();
        $this->debug(__CLASS__. " constructor called.");
    }

    public function __destruct() {
        $this->debug(__CLASS__." destructor called.");
        parent::__destruct();
    }

    public function getView() {
        return "This is a view into ".__CLASS__;
    }
}