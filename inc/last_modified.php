<?php
/**
 * Sets http response headers "last-modified" and "etag"
 *
 * This function also checks if the client cached version of the requested site
 * is still up to date by comparing last-modified and/or etag headers of server
 * and client (in stict mode both have to match) for a given last modification
 * timestamp and identifier (optional). If this client cached version is up to
 * date the status header 304 (not modified) will be set and the program will be
 * terminated.
 *
 * @author	Ansas Meyer
 * @param	int		$timestamp 		late modification timestamp
 * @param	string	$identifier		additional identifier (optional, default: "")
 * @param	bool	$strict			use strict mode (optional, default: false)
 * @return	bool 					true if headers could be set, otherwise false
 * @see		http://ansas-meyer.de/programmierung/php/http-response-header-last-modified-und-etag-mit-php-fuer-caching-setzen/
 */
function last_modified($timestamp, $identifier = "", $strict = false)
{
	// check: are we still allowed to send headers?
	if (headers_sent()) {
	return false;
	}

	// get: header values from client request
	$client_etag =
	!empty($_SERVER['HTTP_IF_NONE_MATCH'])
	?	trim($_SERVER['HTTP_IF_NONE_MATCH'])
	:	null
	;
	$client_last_modified =
	!empty($_SERVER['HTTP_IF_MODIFIED_SINCE'])
	?	trim($_SERVER['HTTP_IF_MODIFIED_SINCE'])
	:	null
	;
	$client_accept_encoding =
	isset($_SERVER['HTTP_ACCEPT_ENCODING'])
	?	$_SERVER['HTTP_ACCEPT_ENCODING']
	:	''
	;

	/**
	* Notes
	*
	* HTTP requires that the ETags for different responses associated with the
	* same URI are different (this is the case in compressed vs. non-compressed
	* results) to help caches and other receivers disambiguate them.
	*
	* Further we cannot trust the client to always enclose the ETag in normal
	* quotation marks (") so we create a "raw" server sided ETag and only
	* compare if our ETag is found in the ETag sent from the client
	*/

	// calculate: current/new header values
	$server_last_modified = gmdate('D, d M Y H:i:s', $timestamp) . ' GMT';
	$server_etag_raw = md5($timestamp . $client_accept_encoding . $identifier);
	$server_etag = '"' . $server_etag_raw . '"';

	// calculate: do client and server tags match?
	$matching_last_modified = $client_last_modified == $server_last_modified;
	$matching_etag = $client_etag && strpos($client_etag, $server_etag_raw) !== false;

	// set: new headers for cache recognition
	header('Last-Modified: ' . $server_last_modified);
	header('ETag: ' . $server_etag);

	// check: are client and server headers identical ("no changes")?
	if (
	($client_last_modified && $client_etag) || $strict
	?	$matching_last_modified && $matching_etag
	:	$matching_last_modified || $matching_etag
	) {
	header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
	exit(304);
	}

	return true;
}