<?php

/*
 * This file is part of the Swagger package.
 *
 * (c) EXSyst
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EGetick\Swagger\Parts;

use EGetick\Swagger\Util\MergeHelper;

/**
 * @internal
 */
trait ConsumesPart
{
    private $consumes;

    private function mergeConsumes(array $data, bool $overwrite)
    {
        MergeHelper::mergeFields($this->consumes, $data['consumes'] ?? null, $overwrite);
    }

    /**
     * Return consumes.
     *
     * @return Set
     */
    public function getConsumes()
    {
        return $this->consumes;
    }
}
