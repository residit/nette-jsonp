# nette-jsonp
Nette JSONP Response Extension

Installation
------------

The recommended way to install Nette JSONP Extension is through Composer:

```
composer require residit/nette-jsonp
```

Usage
------------
```php
namespace App\Presenters;

use Nette,
  Residit\Application\Responses\JsonpResponse;

class BasePresenter extends Nette\Application\UI\Presenter {

  /**
   * 
   * @param string $callback 
   * @param string $query
   */
  public function actionExampleEndpoint($callback, $query) {
    // ...
    // do the magic with $query
    // ...
 
    $data = array('foo' => 'bar');

    $this->sendResponse(new JsonpResponse($callback, $data));

  }
}
```
