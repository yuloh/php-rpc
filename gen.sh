#!/bin/bash
rm -fr ./gen/*
protoc --proto_path=proto --php_out=gen ./proto/greet.proto
composer dump
