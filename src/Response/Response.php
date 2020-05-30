<?php
/**
 * This file is a part of "bert86014/http-client" package.
 * https://github.com/bert86014/http-client
 *
 * Copyright (c) 2019 Furqan A. Siddiqui <hello@bert86014.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code or visit following link:
 * https://github.com/bert86014/http-client/blob/master/LICENSE.md
 */

declare(strict_types=1);

namespace HttpClient\Response;

use HttpClient\Exception\ResponseException;

/**
 * Class Response
 * @package HttpClient
 */
class Response extends HttpClientResponse
{
    /** @var null|string */
    private $body;

    /**
     * @param $body
     * @throws ResponseException
     */
    protected function handleBody($body): void
    {
        if (!is_string($body) && !is_null($body)) {
            throw new ResponseException('Invalid response body');
        }

        $this->body = $body;
    }

    /**
     * @return string
     */
    public function body(): ?string
    {
        return $this->body;
    }
}