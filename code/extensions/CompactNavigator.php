<?php
/**
 * CompactNavigator adds a new method to Content Controller, this can be used instead of the
 * default Silverstripe Navigator. It is a lot more compact, obscuring very little of your site
 * and also works correctly in IE6.
 *
 * CompactNavigator uses a template called CompactNavigator.ss that can be overwritten in your
 * theme, if you require a customised layout.
 *
 * To add CompactNavigation to your template, you need to add $SSCompactNavigator to your
 * template. Ideally either:
 *
 * After your <body> tag or
 * Before your </body> tag
 *
 * @todo add check for user generated styles or javascript, and if they exist, load them instead.
 */
class CompactNavigator extends Extension {
    protected $dataRecord;

    /**
     * @var $adminLink Link to the main admin area
     */
    protected static $adminLink   = 'admin';

    /**
     * Setting the Template static will allow you to use your own custom template files,
     * that overwrite the default behaviour.
     *
     * @todo Ensure that just adding CompactNavigator.ss to your theme will automatically
     * overwrite the default
     *
     * @var String of the Name of your template (no .ss)
     */
    public static $Template;
    /**
     * Setting CssTheme allows you to add a custom CSS file, instead of using the default one.
     * Please note: using this will load your CSS file, instead of the default.
     *
     * @var relative path to CSS file from site root
     */
    public static $CssTheme;
    /**
     * Setting JsTheme allows you to add a custom JavaScript file, instead of using the default one.
     * Please note: using this will load your JavaScript file, instead of the default.
     *
     * @var relative path to JavaScript file from site root
     */
    public static $JsTheme;

    /**
     * SSCompactNavigator first checks if you are allowed to see the navigation bar, and if so, then checks
     * if third party templates have been specified. If so, it loads them, and provides them with the required
     * variables. If not, it loads the defaults instead.
     */
    public function SSCompactNavigator() {
        if(Director::isDev() || Permission::check('CMS_ACCESS_CMSMain')) {
            $RenderTemplate = (isset(CompactNavigator::$Template)) ? CompactNavigator::$Template : $this->class;

            if(isset(CompactNavigator::$CssTheme))
                Requirements::css(CompactNavigator::$CssTheme);
            else
                Requirements::css('compactnavigator/css/CompactNavigator.css');

            if(isset(CompactNavigator::$JsTheme))
                Requirements::javascript(CompactNavigator::$JsTheme);
            else
                Requirements::javascript('compactnavigator/scripts/CompactNavigator.js');

            $this->owner->cmsLink   = Controller::join_links(
                singleton("CMSMain")->Link("edit"),
                "show"
            );
            $this->owner->adminLink = self::$adminLink;

            if($date = Versioned::current_archived_date()) {
                $this->owner->DisplayMode ='Archived';
                $this->owner->ArDate = Object::create('Datetime', $date, null);
            } else
                $this->owner->DisplayMode = Versioned::current_stage();

            return $this->owner->renderWith(array(
                $RenderTemplate,
                'CompactNavigatior'
            ));
        }
    }
}
?>
