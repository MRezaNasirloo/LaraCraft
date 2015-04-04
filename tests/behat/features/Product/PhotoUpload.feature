Feature: Upload Photo Ajax
  In order to add photo to a product
  As a user
  I should be able to select and upload my photos


  Scenario: Product photo upload
    Given I am a shop owner with "john@example.com" with 123456 and Shop name "John's Shop" and logged in
    And I am on the homepage
    When I follow "John's Shop"
    Then I should see "List an item"
    When I follow "List an Item"
    Then I should be on "product/create"
    And I should see "List a new Item"
    Then I fill in the following:
      | name            | John's Shop                          |
      | description     | Some text for our dummy description  |
    And I press "Update My Shop"
    Then I should not see any errors
    And I should be on "shop/john-s-shop"
    And I should see "Your Shop has updated."
    And I should see "John's Shop edited"