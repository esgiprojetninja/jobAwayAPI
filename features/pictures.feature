Feature: Manage pictures
  In order to manage pictures
  As a client software developer
  I need to be able to create, update, retrieve and delete them through the API.

  @createSchema
  Scenario: Create a picture
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "POST" request to "/api/pictures" with body:
    """
    {
      "url": "9781782164104"
    }