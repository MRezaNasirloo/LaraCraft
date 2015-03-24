Feature: Shop
  In order to be able to manages products
  As a user
  I should be able to edit my products


  Scenario: Shop owner is able to edit his products
    Given I am a shop owner with "john@example.com" with 123456 and Shop name "John's Shop" and logged in
    And I list an item with "John's Jeans" and "Some text for our dummy description" with my account "john@example.com"
    And I am on the homepage
    When I follow "John's Shop"
    When I follow "John's Jeans"
    And I should see "Some text for our dummy description"
    And I should see "Edit"
    When I follow "Edit"
    Then I should be on "product/john-s-jeans/edit"
    And I should see "Edit"
    Then I fill in the following:
      | name            | John's Jeans edited                        |
      | description     | Some text for our dummy description edited |
    And I press "update this Item"
    Then I should not see any errors
    And I should be on "product/john-s-jeans"
    And I should see "Your Item has updated."
    And I should see "John's Jeans edited"
    And I should see "Some text for our dummy description edited"


  Scenario: Only Shop owner is able to edit his products
    Given I am a shop owner with "john@example.com" with 123456 and Shop name "John's Shop"
    Given I am a shop owner with "stranger@example.com" with 123456 and Shop name "Stranger's Shop" and logged in
    And I list an item with "John's Jeans" and "Some text for our dummy description" with my account "john@example.com"
    And I list an item with "stranger's Jeans" and "Some text for our dummy description stranger" with my account "stranger@example.com"
    And I am on the homepage
    When I go to "shop/john-s-shop"
    And I follow "John's Jeans"
    Then I should not see "Edit"
    When I go to "product/john-s-jeans/edit"
    Then the response status code should be 404