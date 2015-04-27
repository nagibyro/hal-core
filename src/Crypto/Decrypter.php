<?php
/**
 * @copyright ©2014 Quicken Loans Inc. All rights reserved. Trade Secret,
 *    Confidential and Proprietary. Any dissemination outside of Quicken Loans
 *    is strictly prohibited.
 */

namespace QL\Hal\Core\Crypto;

/**
 * Asymmetric decryption using openssl
 */
class Decrypter
{
    // OPENSSL_CIPHER_AES_128_CBC
    const CIPHER = 'aes-128-cbc';

    /**
     * @type string
     */
    private $privateKey;

    /**
     * @param string $privateKey
     */
    public function __construct($privateKey)
    {
        $this->privateKey = $privateKey;
    }

    /**
     * @param string $encrypted
     *
     * @return string|null
     */
    public function decrypt($encrypted)
    {
        if (!$encrypted) {
            return null;
        }

        $exploded = explode('|', $encrypted);
        if (count($exploded) !== 2) {
            return null;
        }

        $sealed = base64_decode($exploded[0]);
        $key = base64_decode($exploded[1]);

        if (!$sealed || !$key) {
            return null;
        }

        openssl_open($sealed, $unencrypted, $key, $this->privateKey);

        if (!is_string($unencrypted)) {
            return null;
        }

        return $unencrypted;
    }
}