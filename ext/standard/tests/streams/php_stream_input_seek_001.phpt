--TEST--
php_stream_input_seek() with POST data
--POST--
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ex, placerat nec sollicitudin vitae, ultricies molestie nisi. Maecenas lacus magna, eleifend vitae elit non, suscipit finibus velit. Sed vitae scelerisque nunc, tristique mattis arcu. Vivamus pellentesque mauris felis, sed volutpat nisi bibendum congue. Aenean ornare augue vitae convallis dignissim. Proin commodo pellentesque nunc sed aliquam. Duis maximus dolor vitae lorem volutpat hendrerit sit amet quis quam. Vivamus nec justo faucibus ligula placerat placerat. Ut tincidunt, massa non pellentesque sagittis, quam lorem fermentum quam, vitae congue nisl nisl et velit. Integer nisi erat, ultricies sed tempus id, cursus in dolor. Mauris non tempor augue.
--FILE--
<?php
$i = fopen('php://input', 'r');
fseek($i, 5);
var_dump(fread($i, 10));
rewind($i);
var_dump(fread($i, 5));
fseek($i, -6, SEEK_END);
var_dump(fread($i, 6));

?>
--EXPECT--
string(10) " ipsum dol"
string(5) "Lorem"
string(6) "augue."
