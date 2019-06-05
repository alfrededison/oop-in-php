<?php

abstract class DemoAbstractClass
{
    const WE_HAVE_CONST_HERE = 1;

    public $publicMember;
    protected $protectedMember = true;
    private $privateMember = 'private';

    abstract public function methodStub();

    protected function definedMethod()
    {
        return $this->privateMember;
    }
}

interface DemoInterface
{
    const ONLY_CONST = 1;

    function onlyPublicMethodStub();
}

abstract class ChildAbstractClass extends DemoAbstractClass
{
    public function definedMethod()
    {
        // we can change visibility to be more open
    }
}

abstract class AnotherChildAbstractClass extends DemoAbstractClass
{
    /*
     * private function definedMethod() {
     * // we cannot change visibility to be more close
     * }
     */
}

interface AnotherInterface extends DemoInterface {
    /* of course you cannot change visibility
    protected function onlyPublicMethodStub();
     *
     */
}

abstract class GrandChildAbstractClass
    extends AnotherChildAbstractClass /** cannot extend more abstract class*/
    implements DemoInterface, AnotherInterface /** as many as you wish */
{

}