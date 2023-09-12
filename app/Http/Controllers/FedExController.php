<?php

namespace App\Http\Controllers;

use App\Models\FedexSetting;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Config;

use FedEx\ShipService;
use FedEx\ShipService\ComplexType;
use FedEx\ShipService\SimpleType;

class FedExController extends Controller
{
    /**
     * Client for Requests
     *
     * @var GuzzleHttp/Client
     */
    protected $client;
    /**
     * Creates a new Controller Instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => Config::get('fedex.is_live') ? FedexSetting::PRODUCTION_URL : FedexSetting::DEVELOPMENT_URL,
        ]);
    }

    /**
     * get token.
     *
     * @return \Illuminate\Http\Response
     */
    public function getToken()
    {
        try {
            $credentials = [
                'client_id' => Config::get('fedex.key'),
                'client_secret' => Config::get('fedex.password'),
                'grant_type' => 'client_credentials',
            ];
            $response = $this->client->request('POST', 'oauth/token', [
                'form_params' => $credentials,
                'headers' =>
                [
                    'Accept' =>  'application/json',
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ]
            ]);
            $result = json_decode($response->getBody());

            return $result->access_token;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function getRates($data = []){
        try {
            $token = $this->getToken();

            // map packets by loop through the array
            $packages = [];
            foreach ($data['packages'] as $key => $package) {
                $packages[] = [
                    "PackagingType" => [
                        "Code" => "02",
                        "Description" => "Rate"
                    ],
                    "Dimensions" => [
                        "UnitOfMeasurement" => [
                            "Code" => "Lbs",
                            "Description" => "Pounds"
                        ],
                        "Length" => $package['length'],
                        "Width" => $package['width'],
                        "Height" => $package['height']
                    ],
                    "PackageWeight" => [
                        "UnitOfMeasurement" => [
                            "Code" => "LBS",
                            "Description" => "Pounds"
                        ],
                        "Weight" => $package['weight']
                    ]
                ];
            }

            $shipmentRates = [
                "RequestedShipment" => [
                    "ShipTimestamp" => Carbon::now()->toIso8601String(),
                    "DropoffType" => "REGULAR_PICKUP",
                    "ServiceType" => "FEDEX_GROUND",
                    "PackagingType" => "YOUR_PACKAGING",
                    "Shipper" => [
                        "Address" => [
                            "StreetLines" => [
                                "Address Line 1"
                            ],
                            "City" => "Collierville",
                            "StateOrProvinceCode" => "TN",
                            "PostalCode" => "38017",
                            "CountryCode" => "US"
                        ]
                    ],
                    "Recipient" => [
                        "Address" => [
                            "StreetLines" => [
                                "Address Line 1"
                            ],
                            "City" => "Herndon",
                            "StateOrProvinceCode" => "VA",
                            "PostalCode" => "20171",
                            "CountryCode" => "US"
                        ]
                    ],
                    "ShippingChargesPayment" => [
                        "PaymentType" => "SENDER",
                        "Payor" => [
                            "ResponsibleParty" => [
                                "AccountNumber" => Config::get('fedex.account_number')
                            ]
                        ]
                    ],
                    "RateRequestTypes" => "ACCOUNT",
                    "PackageCount" => count($packages),
                    "RequestedPackageLineItems" => $packages
                ]
            ];

            $response = $this->client->request('POST', 'api/rating/v1/Shop', [
                'headers' =>
                [
                    'Authorization' =>  'Bearer ' . $token,
                    'Content-Type' => 'application/json'
                ],
                'json' => $shipmentRates
            ]);
            $result = json_decode($response->getBody());

            return print_r($result, true);

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $headers = $response->getHeaders();
                $body = $response->getBody()->getContents();
                
                // Print the request body
                echo "Request Body:\n";
                echo json_encode($e->getRequest()->getBody(), JSON_PRETTY_PRINT);
                
                echo "Status Code: $statusCode\n";
                echo "Headers: " . print_r($headers, true) . "\n";
                echo "Body: $body\n";
            } else {
                echo "An error occurred: " . $e->getMessage() . "\n";
            }
        }

    }

    public function createShipment(){
        $payload = [
            "mergeLabelDocOption" => "LABELS_AND_DOCS",
            "requestedShipment" => [
                "shipTimestamp" => Carbon::now()->toIso8601String(),
                "dropoffType" => "REGULAR_PICKUP",
                "pickupType" => "USE_SCHEDULED_PICKUP",
                "serviceType" => "FEDEX_GROUND",
                "packagingType" => "FEDEX_PAK",
                "shipper" => [
                    "contact" => [
                        "personName" => "John",
                        "companyName" => "finix",
                        "phoneNumber" => "9012638716"
                    ],
                    "address" => [
                        "streetLines" => [
                            "Address Line 1"
                        ],
                        "city" => "Collierville",
                        "stateOrProvinceCode" => "TN",
                        "postalCode" => "38017",
                        "countryCode" => "US"
                    ]
                ],
                "recipient" => [
                    "contact" => [
                        "personName" => "Doe",
                        "companyName" => "Duff",
                        "phoneNumber" => "9012637906"
                    ],
                    "address" => [
                        "streetLines" => [
                            "Address Line 1"
                        ],
                        "city" => "Herndon",
                        "stateOrProvinceCode" => "VA",
                        "postalCode" => "20171",
                        "countryCode" => "US",
                        "residential" => false
                    ]
                ],
                "shippingChargesPayment" => [
                    "paymentType" => "SENDER",
                    "payor" => [
                        "responsibleParty" => [
                            "accountNumber" => Config::get('fedex.meter_number')
                        ]
                    ]
                ],
                "customsClearanceDetail" => [
                    "dutiesPayment" => [
                        "paymentType" => "SENDER",
                        "payor" => [
                            "responsibleParty" => [
                                "accountNumber" => Config::get('fedex.meter_number')
                            ]
                        ]
                    ],
                    "customsValue" => [
                        "currency" => "USD",
                        "amount" => 200
                    ],
                    "commodities" => [
                        [
                            "numberOfPieces" => 1,
                            "description" => "Books",
                            "countryOfManufacture" => "US",
                            "weight" => [
                                "units" => "LB",
                                "value" => 1
                            ],
                            "quantity" => 1,
                            "quantityUnits" => "EA",
                            "unitPrice" => [
                                "currency" => "USD",
                                "amount" => 200
                            ],
                            "customsValue" => [
                                "currency" => "USD",
                                "amount" => 200
                            ]
                        ]
                    ]
                ],
                "labelSpecification" => [
                    "labelFormatType" => "COMMON2D",
                    "imageType" => "PDF",
                    "labelStockType" => "PAPER_4X6"
                ],
                "packageCount" => 1,
                "requestedPackageLineItems" => [
                    [
                        "sequenceNumber" => 1,
                        "groupPackageCount" => 1,
                        "weight" => [
                            "units" => "LB",
                            "value" => 1
                        ],
                        "dimensions" => [
                            "length" => 10,
                            "width" => 10,
                            "height" => 10,
                            "units" => "IN"
                        ]
                    ]
                ]
            ],
            "labelResponseOptions" => "URL_ONLY",
            "accountNumber" => [
                "value" => Config::get('fedex.account_number')
            ]
        ];
        
        try {
            $token = $this->getToken();
            $response = $this->client->request('POST', 'ship/v1/shipments', [
                'headers' =>
                [
                    'Authorization' =>  'Bearer ' . $token,
                    'X-locale' => 'en_US',
                    'Content-Type' => 'application/json'
                ],
                'json' => $payload
            ]);
            $result = json_decode($response->getBody());
            dd($result);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $headers = $response->getHeaders();
                $body = $response->getBody()->getContents();
                
                // Print the request body
                echo "Request Body:\n";
                echo json_encode($e->getRequest()->getBody(), JSON_PRETTY_PRINT);
                
                echo "Status Code: $statusCode\n";
                echo "Headers: " . print_r($headers, true) . "\n";
                echo "Body: $body\n";
            } else {
                echo "An error occurred: " . $e->getMessage() . "\n";
            }
        }
    }
}
