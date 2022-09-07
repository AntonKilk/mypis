<?php
Class ExampleA {
        public function __construct() {
                print('Constructor ExampleA called' . PHP_EOL);
                return;
}
        public function __destruct() {
                print('Destructor ExampleA called' . PHP_EOL);
                return;
        }
        public function foo() {
                print('Function foo from class A' . PHP_EOL);
}
        public function test() {
                static::foo();
                return;
} }
Class ExampleB extends ExampleA {
        public function __construct() {
                print('Constructor ExampleB called' . PHP_EOL);
                return;
}
        public function __destruct() {
                print('Destructor ExampleB called' . PHP_EOL);
                return;
        }
        public function foo() {
                print('Function foo from class B' . PHP_EOL);
} }
$instanceA = new ExampleA();
$instanceB = new ExampleB();
$instanceA->foo();
$instanceB->foo();
$isntanceA->test();
$instanceB->test();
?>