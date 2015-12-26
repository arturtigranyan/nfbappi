<?php

class SingletonExample {

    public static function getInstance() {
        static $instance = null;
        if ( $instance == null ) {
            $instance = new SingletonExample();
        }
        return $instance;
    }

};
