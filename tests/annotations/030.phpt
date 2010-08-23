--TEST--
ReflectionClass::getAnnotations with complex annotations
--FILE--
<?php

class SimpleAnnotation1 extends ReflectionAnnotation {
}
class SimpleAnnotation2 extends ReflectionAnnotation {
	public $foo;	
}

[SimpleAnnotation1(value={
	[SimpleAnnotation2()],
	[SimpleAnnotation2("test")],
	[SimpleAnnotation2(foo="bar")]
})]
class Foo {
}

$r = new ReflectionClass('Foo');
var_dump($r->getAnnotations());

?>
--EXPECTF--
array(1) {
  ["SimpleAnnotation1"]=>
  object(SimpleAnnotation1)#%d (1) {
    ["value"]=>
    array(3) {
      [0]=>
      object(SimpleAnnotation2)#%d (2) {
        ["foo"]=>
        NULL
        ["value"]=>
        NULL
      }
      [1]=>
      object(SimpleAnnotation2)#%d (2) {
        ["foo"]=>
        NULL
        ["value"]=>
        string(4) "test"
      }
      [2]=>
      object(SimpleAnnotation2)#%d (2) {
        ["foo"]=>
        string(3) "bar"
        ["value"]=>
        NULL
      }
    }
  }
}
