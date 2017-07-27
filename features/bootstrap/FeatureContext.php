<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use Behat\MinkExtension\Context\RawMinkContext;
/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawMinkContext implements Context, SnippetAcceptingContext
{

    /**
     * @Given I am on meQuilibrium
     */
    public function iAmOnMequilibrium()
    {
        $this->visitPath("/");
    }

    /**
     * @When I click on :link
     */
    public function iClickOn($link)
    {
        $this->getSession()->getPage()->findLink($link)->click();
    }

    /**
     * @Then the url will be :Url
     */
    public function theUrlWillBe($url)
    {
        
        $currentUrl = $this->getSession()->getCurrentUrl();

        expect($currentUrl)->toBe($url);
   
    }

    /**
     * @Then the last update was :date
     */
    public function theLastUpdateWas($date)
    {
        $lastUpdate = $this->getSession()->getPage()->find('css', 'em');

        expect($lastUpdate->getText())->toBe($date);
    }
}
