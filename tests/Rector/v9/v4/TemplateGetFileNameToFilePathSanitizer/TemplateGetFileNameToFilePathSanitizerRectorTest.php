<?php

declare(strict_types=1);

namespace Ssch\TYPO3Rector\Tests\Rector\v9\v4\TemplateGetFileNameToFilePathSanitizer;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Ssch\TYPO3Rector\Rector\v9\v4\TemplateGetFileNameToFilePathSanitizerRector;
use Symplify\SmartFileSystem\SmartFileInfo;

final class TemplateGetFileNameToFilePathSanitizerRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideDataForTest()
     */
    public function test(SmartFileInfo $fileInfo): void
    {
        $this->doTestFileInfo($fileInfo);
    }

    public function provideDataForTest(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    protected function getRectorClass(): string
    {
        return TemplateGetFileNameToFilePathSanitizerRector::class;
    }
}
