Feature: Upload Photo Ajax
  In order to add photo to a product
  As a user
  I should be able to select and upload my photos

  @mink:selenium2
  Scenario: Product photo upload
    Given I am on the homepage
    When  I follow "Login"
    Then  the url should match "/auth/login"
    And   I fill in "email" with "john@example.com"
    And   I fill in "password" with "123456"
    And   I press "Login"
    Then  I should not see any errors
    And   I should see "john"
    And   I should be on "/"
    When I follow "John's Shop"
    Then I should see "List an item"
    When I follow "List an Item"
    Then I should be on "product/create"
    And I should see "List a new Item"
    Then I fill in the following:
      | name            | John's Jeans                          |
      | description     | Some text for our dummy description   |
    And I attach the file "placeholder.png" to "image"
    Then I wait a second
    And I press "Add this Item"
    Then I should not see any errors
    And I should be on "shop/johns-shop"
    And I should see "Your Item has added."