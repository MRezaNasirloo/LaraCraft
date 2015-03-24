Feature: Product browsing with paginate
  In order to browse products
  As a user
  I should be able to browse them in pages

  Scenario: Browse the Products
    Given I am on "/product"
    Then I should see "All Products"
    And I should see 28 ".product" elements
    When I follow "»"
    Then I should see 28 ".product" elements
