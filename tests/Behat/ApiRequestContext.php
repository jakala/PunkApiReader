<?php
namespace App\tests\Behat;

use App\Tests\Behat\Mink\MinkHelper;
use App\Tests\Behat\Mink\MinkSessionRequestHelper;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Mink\Session;
use Behat\MinkExtension\Context\RawMinkContext;

final class ApiRequestContext extends RawMinkContext
{
    private $request;

    public function __construct(Session $session)
    {
        $this->request = new MinkSessionRequestHelper(new MinkHelper($session));
    }
    /**
     * @Given I send a :method request to :url
     */
    public function iSendARequestTo($method, $url): void
    {
        $this->request->sendRequest($method, $this->locatePath($url));
    }

    /**
     * @Given I send a :method request to :url with body:
     */
    public function iSendARequestToWithBody($method, $url, PyStringNode $body): void
    {
        $this->request->sendRequestWithPyStringNode($method, $this->locatePath($url), $body);
    }

    /**
     * @Given I send a :method request to :url with params:
     */
    public function ISendARequestToWithParams($method, $url, PyStringNode $query): void
    {
        $query = json_decode($query->getRaw(), true);
        $this->request->sendRequest($method, $url, ['parameters' => $query]);
    }

}