Silverstripe Compact Navigator Module
=====================================

Frontent, themable, admin menu for the Silverstripe CMS, allowing quick access to
admin, edit and draft/live links from the front end of your site.

## Author
This module was created by [i-lateral](http://www.i-lateral.com).

## Installation
Install this module either by downloading and adding to:

[silverstripe-root]/compactnavigator

Then run: http://yoursiteurl.com/dev/build/

Or alternativly add to your projects composer.json

## Usage
Once installed, simply add the template variable $SSCompactNavigator to your Page
master template (preaferable just after the opening body tag), EG:

    <head>
    ...
    </head>
    <body>
        $SSCompactNavigator
        ...
    </body>

If you are in development mode, then the menu will appear at all times in your
templates.

Once you are in live mode, the menu will appear once you have logged in.
