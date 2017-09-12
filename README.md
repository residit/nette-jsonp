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

use Nette;

class BasePresenter extends Nette\Application\UI\Presenter {

  public function actionExampleEndpoint() {
    $this->sendResponse(new \Residit\Application\Responses\JsonpResponse(array('foo' => 'bar')));
  }
}
```
