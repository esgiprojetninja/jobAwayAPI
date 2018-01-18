Feature: Manage pictures
  In order to manage pictures
  As a client software developer
  I need to be able to retrieve, create, update and delete them through the API.

  # the "@createSchema" annotation provided by API Platform creates a temporary SQLite database for testing the API
  @createSchema
  Scenario: Create a picture
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/pictures" with body:
    """
    {
      "url": "http://www.testing.pictures",
    }
    """
    Then the response status code should be 201
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json; charset=utf-8"
    And the JSON should be equal to:
    """
    {
      "@context": "/api/contexts/Picture",
      "@id": "/api/pictures/1",
      "@type": "Picture",
      "id": 1,
      "url": "http://www.testing.pictures",
      "createdAt": "2018-01-18T10:17:48+01:00",
      "updatedAt": "2018-01-18T10:17:48+01:00"
    }
    """

  Scenario: Retrieve the picture list
    When I add "Accept" header equal to "application/json"
    And I send a "GET" request to "/api/pictures"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json; charset=utf-8"
    And the JSON should be equal to:
    """
    {
      "@context": "/contexts/Book",
      "@id": "/books",
      "@type": "hydra:Collection",
      "hydra:member": [
        {
          "@id": "/books/1",
          "@type": "Book",
          "id": 1,
          "isbn": "9781782164104",
          "title": "Persistence in PHP with the Doctrine ORM",
          "description": "This book is designed for PHP developers and architects who want to modernize their skills through better understanding of Persistence and ORM.",
          "author": "K\u00e9vin Dunglas",
          "publicationDate": "2013-12-01T00:00:00+00:00",
          "reviews": []
        }
      ],
      "hydra:totalItems": 1
    }
    """