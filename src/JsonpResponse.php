<?php

/**
 * This file is extension of the Nette Framework (http://nette.org)
 *
 * Copyright (c) 2012 Tomas Kavka (iam@tomaskavka.cz)
 */

namespace Residit\Application\Responses;

use Nette,
    Nette\Application\Responses\JsonResponse,
    Nette\Utils\Json;

/**
 * JSONP response used mainly for AJAX requests cross domain.
 *
 * @author     Tomas Kavka
 *             Martin Falta
 */
class JsonpResponse extends JsonResponse {

  /** @var string */
  private $callback;

  /**
   * @param  string  callback
   * @param  array|stdClass  payload
   */
  public function __construct($callback, $payload) {
    if (!is_string($callback) || empty($callback)) {
      throw new Nette\InvalidArgumentException("Callback isn't string or is empty.");
    }

    if (!is_array($payload) && !$payload instanceof \stdClass) {
      throw new Nette\InvalidArgumentException("Payload has to be instance of stdClass or array.");
    }
    parent::__construct($payload, 'application/javascript');
    $this->callback = $callback;
  }

  /**
   * @return string
   */
  final public function getCallback() {
    return $this->callback;
  }

  /**
   * Sends response to output.
   *
   * @return void
   */
  public function send(Nette\Http\IRequest $httpRequest, Nette\Http\IResponse $httpResponse) {
    $httpResponse->setContentType($this->getContentType());
    $httpResponse->setExpiration(FALSE);
    echo $this->callback . '(' . Json::encode($this->getPayload()) . ')';
  }

}
