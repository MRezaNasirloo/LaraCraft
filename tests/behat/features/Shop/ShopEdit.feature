Feature: Edit Shop
  In order to be able to manages Shop
  As a user
  I should be able to edit my shop


  Scenario: Shop owner is able to edit his Shop
    Given I am a shop owner with "john@example.com" with 123456 and Shop name "John's Shop" and logged in
    And I am on the homepage
    When I follow "John's Shop"
    Then I should see "Edit"
    When I follow "Edit"
    Then I should be on "shop/john-s-shop/edit"
    And I should see "Edit Your Shop"
    Then I fill in the following:
      | name            | John's Shop edited                         |
      | description     | Some text for our dummy description edited |
    And I press "Update My Shop"
    Then I should not see any errors
    And I should be on "shop/john-s-shop"
    And I should see "Your Shop has updated."
    And I should see "John's Shop edited"
    And I should see "Some text for our dummy description edited"


  Scenario: Only Shop owner is able to edit his Shop
    Given I am a shop owner with "john@example.com" with 123456 and Shop name "John's Shop"
    Given I am a shop owner with "stranger@example.com" with 123456 and Shop name "Stranger's Shop" and logged in
    And I am on the homepage
    When I go to "shop/john-s-shop"
    Then I should not see "Edit"
    When I go to "shop/john-s-shop/edit"
    Then the response status code should be 404