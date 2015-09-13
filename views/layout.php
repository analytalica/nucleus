<?hh // strict 

final class :nucleus:layout extends :x:element {
  attribute User user, string controller;

  children (:xhp);

  final protected function render(): XHPRoot {
    return
      <html>
        <nucleus:head />
        <body class={strtolower($this->getAttribute('controller'))}>
          <nucleus:analytics tracking-id={Config::get('GoogleAnalytics')['tracking_id']} />
          <nucleus:nav-bar user={$this->getAttribute('user')} controller={$this->getAttribute('controller')} />
          <nucleus:flash />
          <nucleus:clouds controller={$this->getAttribute('controller')} />
          <div class="container">
            <div class="row col-xs-6 col-xs-offset-3">
              <img class="title-img" src="/img/hacktx.svg" />
            </div>
          </div>
          <div class="container">
            {$this->getChildren()}
          </div>
        </body>
      </html>;
  }
}
