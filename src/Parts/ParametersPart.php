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

use EGetick\Swagger\Collections\Parameters;

/**
 * @internal
 */
trait ParametersPart
{
    /** @var Parameters */
    private $parameters;

    private function mergeParameters(array $data, $overwrite)
    {
        if (isset($data['parameters'])) {
            $this->getParameters()->merge($data['parameters'], $overwrite);
        }
    }

    /**
     * Return parameters.
     *
     * @return Parameters
     */
    public function getParameters()
    {
        if (null === $this->parameters) {
            $this->parameters = new Parameters();
        }

        return $this->parameters;
    }
}
