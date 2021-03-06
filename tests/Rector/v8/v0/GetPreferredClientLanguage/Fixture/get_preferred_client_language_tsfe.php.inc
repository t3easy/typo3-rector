<?php

namespace Ssch\TYPO3Rector\Tests\Rector\v8\v0\GetPreferredClientLanguage\Fixture;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

class FooBarBazTsfe
{
    public function __construct()
    {
        $preferredLanguage = $GLOBALS['TSFE']->csConvObj->getPreferredClientLanguage(GeneralUtility::getIndpEnv('HTTP_ACCEPT_LANGUAGE'));
    }
}

?>
-----
<?php

namespace Ssch\TYPO3Rector\Tests\Rector\v8\v0\GetPreferredClientLanguage\Fixture;

use TYPO3\CMS\Core\Localization\Locales;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

class FooBarBazTsfe
{
    public function __construct()
    {
        $preferredLanguage = GeneralUtility::makeInstance(Locales::class)->getPreferredClientLanguage(GeneralUtility::getIndpEnv('HTTP_ACCEPT_LANGUAGE'));
    }
}

?>
