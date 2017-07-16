<?php

require __DIR__ . '/vendor/autoload.php';

// This works but you can't actually extend.  To test you need to copy and paste this into the real class.
// class Any extends \Google\Protobuf\Any
// {
//     public function pack($message, $typeUrlPrefix = 'type.googleapis.com/')
//     {
//         $descriptor = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool()
//             ->getDescriptorByClassName(get_class($message));

//         if (strlen($typeUrlPrefix) < 1 || $typeUrlPrefix[-1] !== '/') {
//             $this->setTypeUrl($typeUrlPrefix . '/' . $descriptor->getFullName());
//         } else {
//             $this->setTypeUrl($typeUrlPrefix . $descriptor->getFullName());
//         }

//         $this->setValue($message->serializeToString());
//     }

//     public function unpack($message)
//     {
//         $descriptor = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool()
//             ->getDescriptorByClassName(get_class($message));

//         if (!$this->is($descriptor)) {
//             return false;
//         }

//         $message->mergeFromString($this->getValue());
//         return true;
//     }

//     public function typeName()
//     {
//         $typeUrl = $this->getTypeUrl();

//         return substr($typeUrl, strrpos($typeUrl, '/') + 1);
//     }

//     public function is($descriptor)
//     {

//         return $this->typeName() === $descriptor->getFullName();
//     }
// }

$message = new Yuloh\Greeting();
$message->setName('hello');

$any = new \Google\Protobuf\Any();
$any->pack($message);

$envelope = new Yuloh\Envelope();
$envelope->setId(1234);
$envelope->setMessage($any);

$serialized = $envelope->serializeToString();

$newEnvelope = new Yuloh\Envelope();
$newEnvelope->mergeFromString($serialized);

// unpack
$newMessage = new Yuloh\Greeting();
$newEnvelope->getMessage()->unpack($newMessage);

echo 'GREETING: ' . $newMessage->getName();
