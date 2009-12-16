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
	static $adminLink = 'admin';

	public function SSCompactNavigator() {
		if(Director::isDev() || Permission::check('CMS_ACCESS_CMSMain')) {
			Requirements::css('compactnavigator/css/CompactNavigator.css');
			Requirements::javascript('compactnavigator/scripts/CompactNavigator.js');

			$this->owner->cmsLink	= self::$adminLink."/".CMSMain::$url_segment."/show";
			$this->owner->adminLink	= self::$adminLink;

			if($date = Versioned::current_archived_date()) {
				$this->owner->DisplayMode ='Archived';
				$this->owner->ArDate = Object::create('Datetime', $date, null);
			} else
				$this->owner->DisplayMode = Versioned::current_stage();

			return $this->owner->renderWith('CompactNavigator');
		}
	}
}
?>