<?php

use Core\Container;

test('resolve something out of container', function () {
    // arrange
    $container = new Container();

    $container->bind('foo', fn() => 'bar');

    // act
    $result = $container->resolve('foo');

    // assert
    expect($result)->toEqual('bar');
});
