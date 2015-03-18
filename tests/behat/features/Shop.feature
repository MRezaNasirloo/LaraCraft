Feature: Shop
  In order to be able to sell products
  As a user
  I should be able to open a shop and list products



  Scenario: Open a Shop
    Given I already have an account "john@example.com" with 123456
    Given I already have logged in "john@example.com" with 123456
    And   I am on the homepage
    And   I should see "Open Shop"
    When  I follow "Open Shop"
    Then  I should be on "/shop/create"
    And   I should see "Open Your Shop"
    Then  I fill in the following:
      | name            | John's Shop                         |
      | description     | Some text for our dummy description |
    And   I press "Open My Shop"
    Then  I should not see any errors
    Then  I reload the page
    And   I should see "John's Shop"
    And   I should be on "/shop/John's-Shop"
