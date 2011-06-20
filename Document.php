<?php

set_include_path(get_include_path() . ':' . '/Users/lyonsg03/workspace/zend/src/' );
require_once './AbstractModel.php';
require_once '/Users/lyonsg03/workspace/zend/src/Zend/Filter/Input.php';

class Document extends AbstractModel {
    
    protected $_validators = array(
        'title' => array(
            'Alnum'
        )
    );

}

$data = array('title'=>'Test', 'authors'=>array('me','another guy'));

$doc = new Document($data);

var_dump ($doc->title);
var_dump ($doc->authors);
var_dump ($doc->isValid());

$data2 = array('title'=>'asfsd#kj', 'authors'=>array('me','another guy'));

$doc2 = new Document($data2);

var_dump ($doc2->title);
var_dump ($doc2->authors);
var_dump ($doc2->isValid());
