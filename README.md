# meQuilibrium_QA_test
meQuilibrium privacy page click through using behat and selenium2

In this repo I've included all the necessary files to setup the identical environment I used for these tests.

1) Copy/download all files into a project/test folder.

2) Open the terminal and navigate to this folder.

3) Run php.composer update.  This will install behat, selenium2 and all other depencies (i.e. MinkExtension) as defined in the composer.json file.

4) Ensure that the files in features/bootstrap are the same as in this repo.  
  privacy_policy.feature includes the feature description and test scenario written in Gherkin (which Behat interprets).
  FeatureContext.php includes the feature definitions for each scenario.  Behat interprets the privacy_policy.feature and suggests specific features to implement.  These features are defined within FeatureContext.php using PHP.
  
5)Start the selenium2 server. In a separate terminal (with the same path) run ./bin/manager start. You'll see: 
"ensuring binaries are up to date"
"Downloading chromedriver_linux64.zip"
"1 binary updated" ****THIS IS A BUG- READ BELOW FOR FIX****
"Starting Selenium Server..."

Whenever the ./bin/manager command is run, chromedriverv2.1.9 is installed.  This driver version WILL NOT WORK with the versions of Behat, Selenium2 and Mink set out in the composer.json file.  We need chromedriverv2.3.0, which I've included in this repo for convenience.

Extract the contents of the chromedriverv2.3.0 to root/vendor/peridot-php/webdriver-manager/binaries.  Using the v.2.3.0 driver, we can properly interact with the chrome browser.

6)In your other terminal, run bin/behat.  What you should expect to see:
  a)A chrome window open up to https://www.mequilibrium.com/
  b)The page scrolled down all the way to the bottom and the Privacy link clicked (you won't see the link actually clicked, but it is what the test is designed to do)
  c)We've now navigated to https://www.mequilibrium.com/privacy/.

7) In the terminal, you should now see:

Feature: Access meQuilibrium privacy policy
  In order to ensure that meQuilibrium.com's privacy policy clicks through the home page and contains the appropriate update date
  As a website user
  I need to be able to acess meQuilibrium.com's privacy policy through the home page

  Scenario: Access meQuilibrium privacy policy                   # features/bootstrap/privacy_policy.feature:6
    Given I am on meQuilibrium                                   # FeatureContext::iAmOnMequilibrium()
    When I click on "Privacy"                                    # FeatureContext::iClickOn()
    Then the url will be "https://www.mequilibrium.com/privacy/" # FeatureContext::theUrlWillBe()
    And I will see "Last Updated: May 22nd, 2017"                # FeatureContext::iWillSee()
---
Each step under scenario should be in GREEN!  SUCCESS!  

I ensured that the tests are not failing silently by using "expect" in the FeatureContext.php file.  If the privacy URL or Last Updated differs than what I've defined, an error is thrown.  I've double checked this by adding \\ at the end of the url and deleting 17 from 2017 in the date.  When these changes are made, both tests fail.
