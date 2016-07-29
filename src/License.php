<?php

/*
 * This file is part of the Swagger package.
 *
 * (c) EXSyst
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EGetick\Swagger;

use EGetick\Swagger\Parts\ExtensionPart;
use EGetick\Swagger\Parts\UrlPart;
use EGetick\Swagger\Util\MergeHelper;

final class License extends AbstractModel
{
    const REQUIRED = false;

    use UrlPart;
    use ExtensionPart;

    /** @var string */
    private $name;

    public function __construct($data = [])
    {
        $this->merge($data);
    }

    protected function doMerge($data, $overwrite = false)
    {
        MergeHelper::mergeFields($this->name, $data['name'] ?? null, $overwrite);

        $this->mergeExtensions($data, $overwrite);
        $this->mergeUrl($data, $overwrite);
    }

    protected function doExport()
    {
        return [
            'name' => $this->name,
            'url' => $this->url,
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
