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

/***
 * Class PagSeguroSession
 * Represents a PagSeguro Direct Payment Get Session
 */
class PagSeguroSession
{

    /***
     * Session id
     */
    private $id;

    /***
     * @return session id
     */
    public function getId()
    {
        return $this->id;
    }

    /***
     * Sets the session id
     *
     * @param string id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /***
     * @return String a string that represents the current object
     */
    public function toString()
    {
        $session = array();
        $session['id'] = $this->id;

        $session = "Session: " . var_export($session, true);

        return $session;
    }
}