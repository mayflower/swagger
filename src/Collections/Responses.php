<?php

/*
 * This file is part of the Swagger package.
 *
 * (c) EXSyst
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EGetick\Swagger\Collections;

use EGetick\Swagger\Parts\ExtensionPart;
use EGetick\Swagger\Response;
use EGetick\Swagger\AbstractModel;

final class Responses extends AbstractModel
{
    use ExtensionPart;

    private $responses = [];

    public function __construct($data = [])
    {
        $this->merge($data);
    }

    protected function doMerge($data, $overwrite = false)
    {
        $this->mergeExtensions($data, $overwrite);

        // responses
        foreach ($data as $code => $response) {
            if (0 !== strpos($code, 'x-')) {
                $this->set($code, new Response($response));
            }
        }
    }

    protected function doExport()
    {
        return $this->responses;
    }

    /**
     * Returns whether the given response exists.
     *
     * @param string $code
     *
     * @return bool
     */
    public function has($code)
    {
        return isset($this->responses[$code]);
    }

    /**
     * Returns the reponse info for the given code.
     *
     * @param string $code
     *
     * @return Response
     */
    public function get($code)
    {
        if (!$this->has($code)) {
            $this->set($code, new Response());
        }

        return $this->responses[$code];
    }

    /**
     * Sets the response.
     *
     * @param Response $code
     */
    public function set($code, Response $response)
    {
        $this->responses[$code] = $response;

        return $this;
    }

    /**
     * Removes the given repsonse.
     *
     * @param string $code
     */
    public function remove($code)
    {
        unset($this->responses[$code]);

        return $this;
    }
}
