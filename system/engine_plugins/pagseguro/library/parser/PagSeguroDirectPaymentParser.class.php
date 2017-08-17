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
 * Class PagSeguroDirectPaymentParser
 */
class PagSeguroDirectPaymentParser extends PagSeguroServiceParser
{

    /***
     * @param $payment PagSeguroDirectPaymentRequest
     * @return mixed
     */
    public static function getData($payment)
    {

        $data = null;

        // paymentMode
        if ($payment->getPaymentMode() != null) {
            $data["paymentMode"] = $payment->getPaymentMode()->getValue();
        }

        // paymentMethod
        if ($payment->getPaymentMethod()->getPaymentMethod() != null) {
            $data["paymentMethod"] = $payment->getPaymentMethod()->getPaymentMethod();
        }

        // senderHash
        if ($payment->getSenderHash() != null) {
            $data["senderHash"] = $payment->getSenderHash();
        }

         // receiverEmail
        if ($payment->getReceiverEmail() != null) {
            $data["receiverEmail"] = $payment->getReceiverEmail();
        }

        // reference
        if ($payment->getReference() != null) {
            $data["reference"] = $payment->getReference();
        }

        // sender
        if ($payment->getSender() != null) {

            if ($payment->getSender()->getName() != null) {
                $data['senderName'] = $payment->getSender()->getName();
            }
            if ($payment->getSender()->getEmail() != null) {
                $data['senderEmail'] = $payment->getSender()->getEmail();
            }

            // phone
            if ($payment->getSender()->getPhone() != null) {
                if ($payment->getSender()->getPhone()->getAreaCode() != null) {
                    $data['senderAreaCode'] = $payment->getSender()->getPhone()->getAreaCode();
                }
                if ($payment->getSender()->getPhone()->getNumber() != null) {
                    $data['senderPhone'] = $payment->getSender()->getPhone()->getNumber();
                }
            }

            // documents
            /*** @var $document PagSeguroDocument */
            if ($payment->getSender()->getDocuments() != null) {
                $documents = $payment->getSender()->getDocuments();
                if (is_array($documents) && count($documents) == 1) {
                    foreach ($documents as $document) {
                        if (!is_null($document)) {
                            $data['senderCPF'] = $document->getValue();
                        }
                    }
                }
            }
            // ip
             if ($payment->getSender()->getIP() != null) {
                $data['ip'] = $payment->getSender()->getIP();
            }
        }

        // currency
        if ($payment->getCurrency() != null) {
            $data['currency'] = $payment->getCurrency();
        }

        // items
        $items = $payment->getItems();
        if (count($items) > 0) {

            $i = 0;

            foreach ($items as $key => $value) {
                $i++;
                if ($items[$key]->getId() != null) {
                    $data["itemId$i"] = $items[$key]->getId();
                }
                if ($items[$key]->getDescription() != null) {
                    $data["itemDescription$i"] = $items[$key]->getDescription();
                }
                if ($items[$key]->getQuantity() != null) {
                    $data["itemQuantity$i"] = $items[$key]->getQuantity();
                }
                if ($items[$key]->getAmount() != null) {
                    $amount = PagSeguroHelper::decimalFormat($items[$key]->getAmount());
                    $data["itemAmount$i"] = $amount;
                }
                if ($items[$key]->getWeight() != null) {
                    $data["itemWeight$i"] = $items[$key]->getWeight();
                }
                if ($items[$key]->getShippingCost() != null) {
                    $data["itemShippingCost$i"] = PagSeguroHelper::decimalFormat($items[$key]->getShippingCost());
                }
            }
        }

        // extraAmount
        if ($payment->getExtraAmount() != null) {
            $data['extraAmount'] = PagSeguroHelper::decimalFormat($payment->getExtraAmount());
        }

        // shipping
        if ($payment->getShipping() != null) {

            if ($payment->getShipping()->getType() != null && $payment->getShipping()->getType()->getValue() != null) {
                $data['shippingType'] = $payment->getShipping()->getType()->getValue();
            }

            if ($payment->getShipping()->getCost() != null && $payment->getShipping()->getCost() != null) {
                $data['shippingCost'] = PagSeguroHelper::decimalFormat($payment->getShipping()->getCost());
            }

            // address
            if ($payment->getShipping()->getAddress() != null) {
                if ($payment->getShipping()->getAddress()->getStreet() != null) {
                    $data['shippingAddressStreet'] = $payment->getShipping()->getAddress()->getStreet();
                }
                if ($payment->getShipping()->getAddress()->getNumber() != null) {
                    $data['shippingAddressNumber'] = $payment->getShipping()->getAddress()->getNumber();
                }
                if ($payment->getShipping()->getAddress()->getComplement() != null) {
                    $data['shippingAddressComplement'] = $payment->getShipping()->getAddress()->getComplement();
                }
                if ($payment->getShipping()->getAddress()->getCity() != null) {
                    $data['shippingAddressCity'] = $payment->getShipping()->getAddress()->getCity();
                }
                if ($payment->getShipping()->getAddress()->getState() != null) {
                    $data['shippingAddressState'] = $payment->getShipping()->getAddress()->getState();
                }
                if ($payment->getShipping()->getAddress()->getDistrict() != null) {
                    $data['shippingAddressDistrict'] = $payment->getShipping()->getAddress()->getDistrict();
                }
                if ($payment->getShipping()->getAddress()->getPostalCode() != null) {
                    $data['shippingAddressPostalCode'] = $payment->getShipping()->getAddress()->getPostalCode();
                }
                if ($payment->getShipping()->getAddress()->getCountry() != null) {
                    $data['shippingAddressCountry'] = $payment->getShipping()->getAddress()->getCountry();
                }
            }
        }

        // Bank name
        if ($payment->getOnlineDebit() != null) {
            $data["bankName"] = $payment->getOnlineDebit()->getBankName();
        }

        //Credit Card
        if ($payment->getCreditCard() != null) {
            
            //Token
            if ($payment->getCreditCard()->getToken() != null) {
                $data['creditCardToken'] = $payment->getCreditCard()->getToken();
            }

            //Installments
            if ($payment->getCreditCard()->getInstallment() != null) {
                $installment = $payment->getCreditCard()->getInstallment();
                if ($installment->getQuantity() != null && $installment->getValue()) {
                    $data['installmentQuantity'] = $installment->getQuantity();
                    $data['installmentValue']    = PagSeguroHelper::decimalFormat($installment->getValue());
                }
            }

            //Holder
            if ($payment->getCreditCard()->getHolder() != null) {
                $holder = $payment->getCreditCard()->getHolder();
                if ($holder->getName() != null) {
                    $data['creditCardHolderName'] = $holder->getName();
                }
                 // documents
                /*** @var $document PagSeguroDocument */
                if ($payment->getCreditCard()->getHolder()->getDocuments() != null) {
                    $documents = $payment->getCreditCard()->getHolder()->getDocuments();
                        $data['creditCardHolderCPF'] = $documents->getValue();
                }
                if ($holder->getBirthDate() != null) {
                    $data['creditCardHolderBirthDate'] = $holder->getBirthDate();
                }
                // phone
                if ($holder->getPhone() != null) {
                    if ($holder->getPhone()->getAreaCode() != null) {
                        $data['creditCardHolderAreaCode'] = $holder->getPhone()->getAreaCode();
                    }
                    if ($holder->getPhone()->getNumber() != null) {
                        $data['creditCardHolderPhone'] = $holder->getPhone()->getNumber();
                    }
                }
            }

            //Billing Address
            if ($payment->getCreditCard()->getBilling() != null) {
                $billingAddress = $payment->getCreditCard()->getBilling()->getAddress();
                if ($billingAddress->getStreet() != null) {
                    $data['billingAddressStreet'] = $billingAddress->getStreet();
                }
                if ($billingAddress->getNumber() != null) {
                    $data['billingAddressNumber'] = $billingAddress->getNumber();
                }
                if ($billingAddress->getComplement() != null) {
                    $data['billingAddressComplement'] = $billingAddress->getComplement();
                }
                if ($billingAddress->getCity() != null) {
                    $data['billingAddressCity'] = $billingAddress->getCity();
                }
                if ($billingAddress->getState() != null) {
                    $data['billingAddressState'] = $billingAddress->getState();
                }
                if ($billingAddress->getDistrict() != null) {
                    $data['billingAddressDistrict'] = $billingAddress->getDistrict();
                }
                if ($billingAddress->getPostalCode() != null) {
                    $data['billingAddressPostalCode'] = $billingAddress->getPostalCode();
                }
                if ($billingAddress->getCountry() != null) {
                    $data['billingAddressCountry'] = $billingAddress->getCountry();
                }
            }

        }

        // maxAge
        if ($payment->getMaxAge() != null) {
            $data['maxAge'] = $payment->getMaxAge();
        }
        // maxUses
        if ($payment->getMaxUses() != null) {
            $data['maxUses'] = $payment->getMaxUses();
        }

        // redirectURL
        if ($payment->getRedirectURL() != null) {
            $data['redirectURL'] = $payment->getRedirectURL();
        }

        // notificationURL
        if ($payment->getNotificationURL() != null) {
            $data['notificationURL'] = $payment->getNotificationURL();
        }

        // metadata
        if (count($payment->getMetaData()->getItems()) > 0) {
            $i = 0;
            foreach ($payment->getMetaData()->getItems() as $item) {
                if ($item instanceof PagSeguroMetaDataItem) {
                    if (!PagSeguroHelper::isEmpty($item->getKey()) && !PagSeguroHelper::isEmpty($item->getValue())) {
                        $i++;
                        $data['metadataItemKey' . $i] = $item->getKey();
                        $data['metadataItemValue' . $i] = $item->getValue();

                        if (!PagSeguroHelper::isEmpty($item->getGroup())) {
                            $data['metadataItemGroup' . $i] = $item->getGroup();
                        }
                    }
                }
            }
        }

        // parameter
        if (count($payment->getParameter()->getItems()) > 0) {
            foreach ($payment->getParameter()->getItems() as $item) {
                if ($item instanceof PagSeguroParameterItem) {
                    if (!PagSeguroHelper::isEmpty($item->getKey()) && !PagSeguroHelper::isEmpty($item->getValue())) {
                        if (!PagSeguroHelper::isEmpty($item->getGroup())) {
                            $data[$item->getKey() . '' . $item->getGroup()] = $item->getValue();
                        } else {
                            $data[$item->getKey()] = $item->getValue();
                        }
                    }
                }
            }
        }
        return $data;   
    }

    /***
     * @param $str_xml
     * @return PagSeguroDirectPaymentData Success
     */
    public static function readSuccessXml($str_xml)
    {
        $parser = new PagSeguroXmlParser($str_xml);
        $data = $parser->getResult('checkout');
        $PaymentParserData = new PagSeguroPaymentParserData();
        $PaymentParserData->setCode($data['code']);
        $PaymentParserData->setRegistrationDate($data['date']);
        return $PaymentParserData;
    }

    /***
     * @param $str_xml
     * @return parsed credit card brand
     */
     public static function readCCBRandXml($str_xml)
    {
        $parser = new PagSeguroXmlParser($str_xml);
        $PaymentParserData = new PagSeguroPaymentParserData();
        $PaymentParserData->setCode($data['code']);
        $PaymentParserData->setRegistrationDate($data['date']);
        return $PaymentParserData;
    }

    /***
     * @param $str_xml
     * @return parsed transaction
     */
    public static function readTransactionXml($str_xml)
    {
        $parser = new PagSeguroXmlParser($str_xml);
        $data = $parser->getResult('transaction');
        $PaymentParserData = new PagSeguroPaymentParserData();
        $PaymentParserData->setCode($data['code']);
        $PaymentParserData->setRegistrationDate($data['date']);
        return $PaymentParserData;
    }
}
