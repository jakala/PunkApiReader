Feature:
  I want a list of beers
  Scenario: get a list of beers
    When I send a "GET" request to "/get-beers" with params:
    """
    {
    "food": "meal"
    }
    """
    Then the response status code should be 200

