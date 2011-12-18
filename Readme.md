# Abstract Model Class [![Build Status](https://secure.travis-ci.org/grahamlyons/Model.png)](http://travis-ci.org/grahamlyons/Model)

Abstract PHP class for models, using the [Zend Filter Input](http://framework.zend.com/manual/en/zend.filter.input.html, "Zend Filter Input") class from the Zend Framework.

AbstractModel needs to be extended, then $\_fields declared and optionally validators (and filters, although there's no way of actually getting the filtered inputs just yet).

Example:

    class Document extends AbstractModel {

        protected $_fields = array('title', 'author');

        protected $_validators = array(
            'title' => array(
                        'Alnum',
                        'presence' => 'required'
            )
        );

    }

Unit tests are for PHPUnit.
