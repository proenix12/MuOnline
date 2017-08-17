<?php
/**
 * 2007-2014 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 *Licensed under the Apache License, Version 2.0 (the "License");
 *you may not use this file except in compliance with the License.
 *You may obtain a copy of the License at
 *
 *http://www.apache.org/licenses/LICENSE-2.0
 *
 *Unless required by applicable law or agreed to in writing, software
 *distributed under the License is distributed on an "AS IS" BASIS,
 *WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *See the License for the specific language governing permissions and
 *limitations under the License.
 *
 *  @author    PagSeguro Internet Ltda.
 *  @copyright 2007-2014 PagSeguro Internet Ltda.
 *  @license   http://www.apache.org/licenses/LICENSE-2.0
 */

class PagSeguroResources
{

    private static $resources;
    private static $data;
    const VAR_NAME = 'PagSeguroResources';

    private function __construct()
    {
        define('ALLOW_PAGSEGURO_RESOURCES', true);
        require_once PagSeguroLibrary::getPath() . DIRECTORY_SEPARATOR . "resources" . DIRECTORY_SEPARATOR .
            "PagSeguroResources.php";
        $varName = self::VAR_NAME;
        if (isset($$varName)) {
            self::$data = $$varName;
            unset($$varName);
        } else {
            throw new Exception("Resources is undefined.");
        }
    }

    public static function init()
    {
        if (self::$resources == null) {
            self::$resources = new PagSeguroResources();
        }
        return self::$resources;
    }

    public static function getData($key1, $key2 = null)
    {
        if ($key2 != null) {
            if (isset(self::$data[$key1][$key2])) {
                return self::$data[$key1][$key2];
            } else {
                throw new Exception("Resources keys {$key1}, {$key2} not found.");
            }
        } else {
            if (isset(self::$data[$key1])) {
                return self::$data[$key1];
            } else {
                throw new Exception("Resources key {$key1} not found.");
            }
        }
    }

    public static function setData($key1, $key2, $value)
    {
        if (isset(self::$data[$key1][$key2])) {
            self::$data[$key1][$key2] = $value;
        } else {
            throw new Exception("Resources keys {$key1}, {$key2} not found.");
        }
    }

    public static function getWebserviceUrl($environment)
    {
        if (isset(self::$data['webserviceUrl']) && 
            isset(self::$data['webserviceUrl'][$environment])
        ) {
            return self::$data['webserviceUrl'][$environment];
        } else {
            throw new Exception("WebService URL not set for $environment environment.");
        }
    }

    public static function getPaymentUrl($environment)
    {
        if (isset(self::$data['paymentService']) && isset(self::$data['paymentService']['baseUrl']) &&
            isset(self::$data['paymentService']['baseUrl'][$environment])
        ) {
            return self::$data['paymentService']['baseUrl'][$environment];
        } else {
            throw new Exception("Payment URL not set for $environment environment.");
        }
    }

     public static function getBaseUrl($environment)
    {
        if (isset(self::$data['baseUrl']) &&
            isset(self::$data['baseUrl'][$environment])
        ) {
            return self::$data['baseUrl'][$environment];
        } else {
            throw new Exception("Base URL not set for $environment environment.");
        }
    }

    public static function getStaticUrl($environment)
    {
        if (isset(self::$data['staticUrl']) &&
            isset(self::$data['staticUrl'][$environment])
        ) {
            return self::$data['staticUrl'][$environment];
        } else {
            throw new Exception("Static URL not set for $environment environment.");
        }
    }

    public static function getInstallmentUrl()
    {   
        if (isset(self::$data['installmentService']) && 
            isset(self::$data['installmentService']['url'])
        ) {
            return self::$data['installmentService']['url'];
        } else {
            throw new Exception("Installment base URL not found");
        }
    }

    public static function getAuthorizationUrl()
    {
        if (isset(self::$data['authorizationService']) &&
            isset(self::$data['authorizationService']['servicePath'])
        ) {
            return self::$data['authorizationService']['servicePath'];
        } else {
            throw new Exception("Authorization service path URL not found");
        }
    }

    public static function getSessionUrl()
    {   
        if (isset(self::$data['sessionService']) && 
            isset(self::$data['sessionService']['url'])
        ) {
            return self::$data['sessionService']['url'];
        } else {
            throw new Exception("Session base URL not found");
        }
    }
}
