<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 */

namespace Zend\Feed\Reader;

interface ReaderImportInterface
{
    /**
     * Import a feed by providing a URI
     *
     * @param  string $uri The URI to the feed
     * @param  string $etag OPTIONAL Last received ETag for this resource
     * @param  string $lastModified OPTIONAL Last-Modified value for this resource
     * @return Feed\FeedInterface
     * @throws Exception\RuntimeException
     */
    public static function import($uri, $etag = null, $lastModified = null);

    /**
     * Import a feed from a remote URI
     *
     * Performs similarly to import(), except it uses the HTTP client passed to
     * the method, and does not take into account cached data.
     *
     * Primary purpose is to make it possible to use the Reader with alternate
     * HTTP client implementations.
     *
     * @param  string $uri
     * @param  Http\ClientInterface $client
     * @return self
     * @throws Exception\RuntimeException if response is not an Http\ResponseInterface
     */
    public static function importRemoteFeed($uri, Http\ClientInterface $client);


    /**
     * Import a feed from a string
     *
     * @param  string $string
     * @return Feed\FeedInterface
     * @throws Exception\InvalidArgumentException
     * @throws Exception\RuntimeException
     */
    public static function importString($string);


    /**
     * Imports a feed from a file located at $filename.
     *
     * @param  string $filename
     * @throws Exception\RuntimeException
     * @return Feed\FeedInterface
     */
    public static function importFile($filename);
}
