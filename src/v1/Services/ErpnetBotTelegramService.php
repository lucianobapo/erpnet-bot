<?php

/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 01/01/17
 * Time: 20:36
 */

namespace ErpNET\Bot\v1\Services;

use Illuminate\Http\Request;
use ErpNET\Bot\v1\Interfaces\ErpnetBotService;

class ErpnetBotTelegramService implements ErpnetBotService
{
//    protected $providerRepository;
//    protected $userRepository;
//    protected $contactRepository;
//    protected $productRepository;
//    protected $productGroupRepository;
//    protected $orderRepository;
//    protected $itemOrderRepository;
//    protected $addressRepository;
//    protected $partnerRepository;
//    protected $sharedOrderTypeRepository;
//    protected $sharedOrderPaymentRepository;
//    protected $sharedCurrencyRepository;

//    protected $orderService;
//    protected $partnerService;

    /**
     * Service constructor.
     *
     */
    public function __construct(
//                                ProviderRepository $providerRepository
//                                UserRepository $userRepository
//                                ContactRepository $contactRepository,
//                                ProductRepository $productRepository,
//                                ProductGroupRepository $productGroupRepository,
//                                OrderRepository $orderRepository,
//                                ItemOrderRepository $itemOrderRepository,
//                                AddressRepository $addressRepository,
//                                PartnerRepository $partnerRepository,
//                                SharedOrderTypeRepository $sharedOrderTypeRepository,
//                                SharedOrderPaymentRepository $sharedOrderPaymentRepository,
//                                SharedCurrencyRepository $sharedCurrencyRepository,
    
//                                OrderService $orderService,
//                                PartnerService $partnerService
    )
    {
//        $this->providerRepository = $providerRepository;
//        $this->userRepository = $userRepository;
//        $this->contactRepository = $contactRepository;
//        $this->productRepository = $productRepository;
//        $this->productGroupRepository = $productGroupRepository;
//        $this->orderRepository = $orderRepository;
//        $this->itemOrderRepository = $itemOrderRepository;
//        $this->addressRepository = $addressRepository;
//        $this->partnerRepository = $partnerRepository;
//        $this->sharedOrderTypeRepository = $sharedOrderTypeRepository;
//        $this->sharedOrderPaymentRepository = $sharedOrderPaymentRepository;
//        $this->sharedCurrencyRepository = $sharedCurrencyRepository;

//        $this->orderService = $orderService;
//        $this->partnerService = $partnerService;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function resolveCommand(Request $request)
    {
        return true;
    }
    /**
     * @param Request $request
     * @return bool
     */
    public function unknownCommand(Request $request)
    {
        return true;
    }
    /**
     * @param Request $request
     * @return bool
     */
    public function executeCommand(Request $request)
    {
        return true;
    }
}