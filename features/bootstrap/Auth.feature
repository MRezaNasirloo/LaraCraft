Feature: LaraCraft Auth
  In order to use the laracraft features
  As a user
  I should be able to sign up for a new account


  Scenario: Register a User
    Given I am on the homepage
    When  I follow "Register"
    Then  the url should match "/auth/register"
    And   I fill in "name" with "John"
    And   I fill in "email" with "john@example.com"
    And   I fill in "password" with "123456"
    And   I fill in "password_confirmation" with "123456"
    And   I press "Register"
    Then  I should not see any errors
    And   I should see "John"
    And   I should be on "/home"


  Scenario: Login a User
    Given I already have an account "john@example.com" with 123456
    Given I am on the homepage
    When  I follow "Login"
    Then  the url should match "/auth/login"
    And   I fill in "email" with "john@example.com"
    And   I fill in "password" with "123456"
    And   I press "Login"
    Then  I should not see any errors
    And   I should see "john"

    
  Scenario: Logout a User
    Given I already have an account "john@example.com" with 123456
    And   I already have logged in "john@example.com" with 123456
    Given I am on the homepage
    Then  I should see "john"
    When  I follow "Logout"
    Then  I should not see "john"
    And   I should see "Login"
