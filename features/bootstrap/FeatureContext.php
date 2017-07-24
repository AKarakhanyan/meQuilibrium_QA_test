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
        $this->getSession()->getPage()->find('css', '#menu-item-157 > a')->click();
    }

    /**
     * @Then the url will be :privacyUrl
     */
    public function theUrlWillBe($privacyUrl)
    {
        
        $currentUrl = $this->getSession()->getCurrentUrl();

        expect($currentUrl)->toBe($privacyUrl);
   
    }

    /**
     * @Then I will see :arg1
     */
    public function iWillSee($lastUpdated)
    {
        $lastUpdate = $this->getSession()->getPage()->find('css', '#primary > section > div > div > p:nth-child(1) > em');

        expect($lastUpdate->getText())->toBe($lastUpdated);
    }
}
