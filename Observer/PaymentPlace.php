<?php

namespace Liftmode\CodOrdersCustomStatus\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\OfflinePayments\Model\Cashondelivery;

class PaymentPlace implements ObserverInterface
{
/*
    protected $logger;

    public function __construct(
       \Psr\Log\LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }
*/
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $orderPayment = $observer->getEvent()->getPayment();
        $paymentMethodCode = $orderPayment->getMethodInstance()->getCode();
        $order = $orderPayment->getOrder();

        if ($paymentMethodCode == Cashondelivery::PAYMENT_METHOD_CASHONDELIVERY_CODE) {
             $order->setStatus('cod_processing');
        }
    }
}
