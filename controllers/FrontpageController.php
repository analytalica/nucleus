<?hh

class FrontpageController extends BaseController {
  public static function getPath(): string {
    return '/';
  }

  public static function get(): :xhp {
    # If a user is logged in, redirect them to where they belong
    if(Session::isActive()) {
      header('Location: /dashboard');
    }

    $registration = "Registration now open";
    $button = "APPLY NOW";
    if (!Settings::get('applications_open')) {
      $registration = "Registration is now closed";
      $button = "CHECK MY STATUS";
    }

    return
      <div class="col-md-6 col-md-offset-3 masthead">
        <h3 class="hero-info">Austin, TX  |  Sept. 26-27</h3>
        <p class="prompt-open">{$registration}</p>
        <p><a id="signin" class="btn btn-default col-xs-12" role="button" href="/login">{$button}</a></p>
        <p class="info">Applications are acccepted on a first come first serve basis. If accepted, you will receive a confirmation email in ~7 days.</p>
        <div class="footer">
          <p class="footer-prompt">Already Have An Account? <a href={LoginController::getPath()}>Log in Here</a></p>
          <p class="footer-prompt">Having Trouble? Email Us <a href="mailto:hello@hacktx.com">hello@hacktx.com</a></p>
        </div>
      </div>;
  }
}
