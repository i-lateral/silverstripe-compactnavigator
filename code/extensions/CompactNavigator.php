<?php
/**
 * SSNController adds a new method to Content Controller, this replaces the default Silverstripe
 * Navigator. Instead of hard codede links, SSNavigator should allow URL's in the navigator to
 * be altered a bit more easily and should allow for custom templating within the users
 * Templates folder.
 * 
 * To add The new navigator bar, add $SSNavigator to your template, in place of the traditional
 * $Silverstripenavigator
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