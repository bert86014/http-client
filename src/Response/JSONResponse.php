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
 * Class JSONResponse
 * @package HttpClient\Response
 */
class JSONResponse extends HttpClientResponse
{
    /** @var array */
    private $data;

    /**
     * @param $body
     * @throws ResponseException
     */
    protected function handleBody($body): void
    {
        if (!$body || !is_string($body)) {
            throw new ResponseException('Invalid JSON response body');
        }

        $data = json_decode($body, true);
        if (!is_array($data)) {
            throw new ResponseException('Failed to decode JSON response');
        }

        $this->data = $data;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function get(string $key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * @return array
     */
    public function array(): array
    {
        return $this->data;
    }
}