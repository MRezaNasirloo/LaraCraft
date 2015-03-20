Feature: Shop
  In order to be able to sell products
  As a user
  I should be able to open a shop and list products



  Scenario: Open a Shop
    Given I already have an account "john@example.com" with 123456
    Given I already have logged in "john@example.com" with 123456
    And I am on the homepage
    And I should see "Open Shop"
    When I follow "Open Shop"
    Then I should be on "/shop/create"
    And I should see "Open Your Shop"
    Then I fill in the following:
      | name            | John's Shop                         |
      | description     | Some text for our dummy description |
    And I press "Open My Shop"
    Then I should not see any errors
    Then I reload the page
    And I should see "John's Shop"
    And I should be on "/shop/John's-Shop"

  Scenario: List an Item
    Given I already have an account "john@example.com" with 123456
    And I already have logged in "john@example.com" with 123456
    And I already have opened a shop with name "John's Shop"
    And I am on the homepage
    When I follow "John's Shop"
    Then I should be on "/shop/johns-shop"
    When I follow "List an Item"
    Then I should be on "/product/create"
    And I should see "List a new Item"
    Then I fill in the following:
      | name            | John's Jeans                        |
      | description     | Some text for our dummy description |
    And I press "Add this Item"
    Then I should not see any errors
    And I should see "Your Item has added."
    And I should be on "/shop/johns-shop"


  Scenario: User without a Shop
    Given I already have an account "john@example.com" with 123456
    And I already have logged in "john@example.com" with 123456
    And I am on the homepage
    And I should see "Open Shop"
    When I go to "/product/create"
    Then I should be on "/shop/create"
    And I should not see "List a new Item"


  Scenario: Shop owner is able to edit his products
    Given I am a shop owner with "john@example.com" with 123456 and Shop name "John's Shop" and logged in
    And I list an item with "John's Jeans" and "Some text for our dummy description" with my account "john@example.com"
    And I am on the homepage
    When I follow "John's Shop"
    When I follow "John's Jeans"
    And I should see "Some text for our dummy description"
    And I should see "Edit"
    When I follow "Edit"
    Then I should be on "product/johns-jeans/edit"
    And I should see "Edit"
    Then I fill in the following:
      | name            | John's Jeans edited                        |
      | description     | Some text for our dummy description edited |
    And I press "update this Item"
    Then I should not see any errors
    And I should be on "product/johns-jeans"
    And I should see "Your Item has updated."
    And I should see "John's Jeans edited"
    And I should see "Some text for our dummy description edited"


  Scenario: Only Shop owner is able to edit his products
    Given I am a shop owner with "john@example.com" with 123456 and Shop name "John's Shop"
    Given I am a shop owner with "stranger@example.com" with 123456 and Shop name "Stranger's Shop" and logged in
    And I list an item with "John's Jeans" and "Some text for our dummy description" with my account "john@example.com"
    And I list an item with "stranger's Jeans" and "Some text for our dummy description stranger" with my account "stranger@example.com"
    And I am on the homepage
    When I go to "/shop/johns-shop"
    And I follow "John's Jeans"
    Then I should see "Edit"
    When I follow "Edit"
    Then I should be on "product/johns-jeans/edit"
    And I should see "Edit"
    Then I fill in the following:
      | name            | John's Jeans edited from stranger                      |
      | description     | Some text for our dummy description edited from stranger |
    And I press "update this Item"
    Then I should not see any errors
    And I should be on "product/johns-jeans"
    And I should see "Your Item has updated."
    And I should see "John's Jeans edited from stranger"
    And I should see "Some text for our dummy description edited from stranger"


