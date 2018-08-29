<?php

namespace Derralf\Elements\CtaFlexImage\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

/**
 * Class LeftAndMainExtension.
 */
class LeftAndMainExtension extends Extension
{
    public function init()
    {
        Requirements::css('derralf/elemental-cta-fleximage: icons/icons.css');
    }
}
