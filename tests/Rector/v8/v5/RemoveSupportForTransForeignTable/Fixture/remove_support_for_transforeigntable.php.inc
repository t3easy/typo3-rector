<?php

namespace Ssch\TYPO3Rector\Tests\Rector\v8\v5\RemoveSupportForTransForeignTable\Fixture;

return [
    'ctrl' => [
        'transForeignTable' => 'l10n_parent',
        'transOrigPointerTable' => 'l10n_parent',
    ],
    'columns' => [],
];

?>
-----
<?php

namespace Ssch\TYPO3Rector\Tests\Rector\v8\v5\RemoveSupportForTransForeignTable\Fixture;

return [
    'ctrl' => [],
    'columns' => [],
];

?>
