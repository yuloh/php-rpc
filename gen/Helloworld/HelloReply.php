<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: helloworld.proto

namespace Helloworld;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * <pre>
 * The response message containing the greetings
 * </pre>
 *
 * Protobuf type <code>helloworld.HelloReply</code>
 */
class HelloReply extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>string message = 1;</code>
     */
    private $message = '';

    public function __construct() {
        \GPBMetadata\Helloworld::initOnce();
        parent::__construct();
    }

    /**
     * <code>string message = 1;</code>
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * <code>string message = 1;</code>
     */
    public function setMessage($var)
    {
        GPBUtil::checkString($var, True);
        $this->message = $var;

        return $this;
    }

}

