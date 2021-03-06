<?php

declare(strict_types=1);

namespace Ssch\TYPO3Rector\Generator\Generator;

use Rector\RectorGenerator\TemplateFactory;
use Ssch\TYPO3Rector\Generator\FileSystem\TemplateFileSystem;
use Symplify\SmartFileSystem\SmartFileInfo;
use Symplify\SmartFileSystem\SmartFileSystem;

final class FileGenerator
{
    /**
     * @var TemplateFileSystem
     */
    private $templateFileSystem;

    /**
     * @var TemplateFactory
     */
    private $templateFactory;

    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;

    public function __construct(
        SmartFileSystem $smartFileSystem,
        TemplateFactory $templateFactory,
        TemplateFileSystem $templateFileSystem
    ) {
        $this->templateFileSystem = $templateFileSystem;
        $this->templateFactory = $templateFactory;
        $this->smartFileSystem = $smartFileSystem;
    }

    /**
     * @param SmartFileInfo[] $templateFileInfos
     * @param string[] $templateVariables
     * @return string[]
     */
    public function generateFiles(
        array $templateFileInfos,
        array $templateVariables,
        string $destinationDirectory
    ): array {
        $generatedFilePaths = [];

        foreach ($templateFileInfos as $fileInfo) {
            $generatedFilePaths[] = $this->generateFileInfoWithTemplateVariables(
                $fileInfo,
                $templateVariables,
                $destinationDirectory
            );
        }

        return $generatedFilePaths;
    }

    /**
     * @param array<string, mixed> $templateVariables
     */
    private function generateFileInfoWithTemplateVariables(
        SmartFileInfo $smartFileInfo,
        array $templateVariables,
        string $targetDirectory
    ): string {
        $targetFilePath = $this->templateFileSystem->resolveDestination(
            $smartFileInfo,
            $templateVariables,
            $targetDirectory
        );

        $content = $this->templateFactory->create($smartFileInfo->getContents(), $templateVariables);

        $this->smartFileSystem->dumpFile($targetFilePath, $content);

        return $targetFilePath;
    }
}
