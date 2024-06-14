<?php

it('validates a string', function(){
    $result = \Core\Validator::string('foobar');
    expect($result)->toBeTrue();
});

it('validates an email', function(){
    $result = \Core\Validator::email('foobar@boo.com');
    expect($result)->toBeTrue();
});