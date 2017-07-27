Feature: Access meQuilibrium privacy policy
  In order to ensure that meQuilibrium.com's privacy policy clicks through the home page and contains the appropriate update date
  As a website user
  I need to be able to acess meQuilibrium.com's privacy policy through the home page
 
Scenario: Access meQuilibrium privacy policy
  Given I am on meQuilibrium
  When I click on "Privacy"
  Then the url will be "https://www.mequilibrium.com/privacy/"
    And the last update was "Last Updated: May 22nd, 2017"