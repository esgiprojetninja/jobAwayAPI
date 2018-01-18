<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {

    }

    /**
     * @When I add :arg1 header equal to :arg2
     */
    public function iAddHeaderEqualTo($arg1, $arg2)
    {
        throw new PendingException("I ADD HEADER " . $arg1 . "EQUAL TO ".$arg2);
    }

    /**
     * @When I send a :arg1 request to :arg2 with body:
     */
    public function iSendARequestToWithBody($arg1, $arg2, PyStringNode $string)
    {
        throw new PendingException("I SEND A REQUEST TO WITH BODY");
    }

    /**
     * @Then the response status code should be :arg1
     */
    public function theResponseStatusCodeShouldBe($arg1)
    {
        throw new PendingException("Response status code should be" . $arg1);
    }

    /**
     * @Then the response should be in JSON
     */
    public function theResponseShouldBeInJson()
    {
        throw new PendingException("Response is in JSON");
    }

    /**
     * @Then the header :arg1 should be equal to :arg2
     */
    public function theHeaderShouldBeEqualTo($arg1, $arg2)
    {
        throw new PendingException("Header should be equal to ". $arg2." but is ".$arg1);
    }

    /**
     * @Then the JSON should be equal to:
     */
    public function theJsonShouldBeEqualTo(PyStringNode $string)
    {
        throw new PendingException("The JSON should be equal to ".$string);
    }

    /**
     * @When I send a :arg1 request to :arg2
     */
    public function iSendARequestTo($arg1, $arg2)
    {
        throw new PendingException("I SEND A REQUEST ");
    }


}
