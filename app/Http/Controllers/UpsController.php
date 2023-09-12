<?php

namespace App\Http\Controllers;

use App\Models\SaleTransactionDetail;
use App\Models\UpsSetting;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Config;

class UpsController extends Controller
{
    /**
     * Client for Requests
     *
     * @var GuzzleHttp/Client
     */
    protected $client;

    protected $shippingServicesDomestic = [
        "14" => "UPS Next Day Air Early",
        "01" => "UPS Next Day Air",
        "13" => "UPS Next Day Air Saver",
        "59" => "UPS 2nd Day Air A.M.",
        "02" => "UPS 2nd Day Air",
        "12" => "UPS 3 Day Select",
        "03" => "UPS Ground"
    ];

    /**
     * Creates a new Controller Instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => Config::get('ups.is_live') ? UpsSetting::PRODUCTION_URL : UpsSetting::DEVELOPMENT_URL,
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
            if(!session()->has('ups_token')){
                $credentials = [
                    'grant_type' => 'client_credentials',
                ];
                $response = $this->client->request('POST', 'security/v1/oauth/token', [
                    'form_params' => $credentials,
                    'headers' =>
                    [
                        'Authorization' => 'Basic ' . base64_encode(Config::get('ups.client_id') . ':' . Config::get('ups.secret')),
                        'Accept' =>  'application/json',
                        'Content-Type' => 'application/x-www-form-urlencoded'
                    ]
                ]);
                $result = json_decode($response->getBody());
                
                $token = $result->access_token;
                // store token in session
                session(['ups_token' => $token]);
            }else{
                $token = session()->get('ups_token');
            }
            return $token;
            
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

    // address validation
    public function validateAddress(Request $request){
        $data = $request->all();
        try {
            $token = $this->getToken();
            $addressLine = array_filter($data['address']);
            $address = [
                "XAVRequest" => [
                    "Request" => [
                        "RequestOption" => "3",
                        "TransactionReference" => [
                            "CustomerContext" => "Glass Parcel",
                        ]
                    ],
                    "AddressKeyFormat" => [
                        "ConsigneeName" => $data['firstname'] ?? "Doee",
                        "AddressLine" => [
                            $addressLine ?? "26601 ALISO CREEK ROAD"
                        ],
                        "PoliticalDivision2" => $data['city'] ?? "ALISO VIEJO",
                        "PoliticalDivision1" => $data['state'] ?? "CA",
                        "PostcodePrimaryLow" => $data['zip_code'] ?? "92656",
                        "CountryCode" => "US"
                    ]
                ]
            ];

            $response = $this->client->request('POST', 'api/addressvalidation/v1/3', [
                'headers' =>
                [
                    'Authorization' =>  'Bearer ' . $token,
                    'Content-Type' => 'application/json'
                ],
                'json' => $address
            ]);

            $result = [
                'response' => json_decode($response->getBody()),
                'status' => $response->getStatusCode(),
            ];

            return $result;

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $headers = $response->getHeaders();
                $body = $response->getBody();

                if($statusCode == 401){
                    // refresh token
                    session()->forget('ups_token');
                }
                
                $result = [
                    'response' => json_decode($response->getBody()),
                    'status' => $response->getStatusCode(),
                    'error' => json_decode($response->getBody())->response->errors
                ];
                
                return $result;

            } else {
                echo "An error occurred: " . $e->getMessage() . "\n";
            }
        }

    }

    public function getRates($sale_detail_id){
        try {
            $token = $this->getToken();

            $saleDetail = SaleTransactionDetail::find($sale_detail_id);
            $data['customer'] = $saleDetail->mainTransaction->customer->toArray();
            $address = $saleDetail->mainTransaction->address ? json_decode($saleDetail->mainTransaction->address) : null;

            // map ship to address
            $data['customer_name'] = $data['customer']['name'];
            $data['customer_phone_number'] = $data['customer']['phone'];
            $data['customer_address_line'] = $address->AddressLine;
            $data['customer_city'] = $address->City;
            $data['customer_state'] = $address->State;
            $data['customer_zip_code'] = $address->ZipCode;


            // map packets by loop through the array
            $packages = [
                "SimpleRate" => [
                    "Description" => "SimpleRateDescription",
                    "Code" => "XS"
                ],
                "PackagingType" => [
                    "Code" => "02",
                    "Description" => "Rate"
                ],
                "Dimensions" => [
                    "UnitOfMeasurement" => [
                        "Code" => "IN",
                        "Description" => "Inches"
                    ],
                    "Length" => "20",
                    "Width" => "20",
                    "Height" => "20"
                ],
                "PackageWeight" => [
                    "UnitOfMeasurement" => [
                        "Code" => "LBS",
                        "Description" => "Pounds"
                    ],
                    "Weight" => "10"
                ]
            ];

            $shipmentRates = [
                "RateRequest" => [
                    "Request" => [
                        "RequestOption" => "Shop",
                        "TransactionReference" => [
                            "CustomerContext" => "Glass Parcel",
                        ]
                    ],
                    "Shipment" => [
                        "Shipper" => [
                            "Name" => "Shawn Jahani",
                            "ShipperNumber" => Config::get('ups.account_number'),
                            "Address" => [
                                "AddressLine" => [
                                    Config::get('ups.ship_from_addressLine')
                                ],
                                "City" => Config::get('ups.ship_from_city'),
                                "StateProvinceCode" => Config::get('ups.ship_from_state'),
                                "PostalCode" => Config::get('ups.ship_from_postalCode'),
                                "CountryCode" => "US"
                            ]
                        ],
                        "ShipTo" => [
                            "Name" => $data['customer_name'] ?? "Doe",
                            "AttentionName" => $data['customer_name'] ?? "1160b_74",
                            "Phone" => [
                                "Number" => $data['customer_phone_number'] ?? "1234567890"
                            ],
                            "Address" => [
                                "AddressLine" => [
                                    $data['customer_address_line'] ?? "26601 ALISO CREEK ROAD, ALISO VIEJO TOWN CENTER"
                                ],
                                "City" => $data['customer_city'] ?? "ALISO VIEJO",
                                "StateProvinceCode" => $data['customer_state'] ?? "CA",
                                "PostalCode" => $data['customer_zip_code'] ?? "92656",
                                "CountryCode" => "US"
                            ]
                        ],
                        "Package" => $packages
                    ]
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

            $result = $result->RateResponse->RatedShipment;

            // recreate the rate array with service.code, service.name, service.rate
            $rates = [];
            foreach ($result as $key => $rate) {
                $rates[] = [
                    'service_code' => $rate->Service->Code,
                    'service_name' => $this->shippingServicesDomestic[$rate->Service->Code],
                    'service_rate' => $rate->TotalCharges->MonetaryValue,
                    'service_currency' => $rate->TotalCharges->CurrencyCode,
                    'service_html' => '<option value="' . $rate->Service->Code . '">' . $this->shippingServicesDomestic[$rate->Service->Code] . ' - $' . $rate->TotalCharges->MonetaryValue . '</option>',
                ];
            }

            return json_encode($rates);

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $headers = $response->getHeaders();
                $body = $response->getBody()->getContents();

                if($statusCode == 401){
                    // refresh token
                    session()->forget('ups_token');
                }
                
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

    public function createShipment(Request $request){
        try {
            $token = $this->getToken();

            $saleDetail = SaleTransactionDetail::find($request->detail_id);
            $data['customer'] = $saleDetail->mainTransaction->customer->toArray();
            $address = $saleDetail->mainTransaction->address ? json_decode($saleDetail->mainTransaction->address) : null;

            // map ship to address
            $data['customer_name'] = $data['customer']['name'];
            $data['customer_phone_number'] = $data['customer']['phone'];
            $data['customer_address_line'] = $address->AddressLine;
            $data['customer_city'] = $address->City;
            $data['customer_state'] = $address->State;
            $data['customer_zip_code'] = $address->ZipCode;

            $addressLine = array_filter($address->AddressLine);

            $shipment = [
                "ShipmentRequest" => [
                    "Request" => [
                        "SubVersion" => "1801",
                        "RequestOption" => "nonvalidate",
                        "TransactionReference" => [
                            "CustomerContext" => "Glass Parcel",
                        ]
                    ],
                    "Shipment" => [
                        "Description" => "Ship WS test",
                        "Shipper" => [
                            "Name" => "Shawn Jahani",
                            "Phone" => [
                                "Number" => "1234567890"
                            ],
                            "ShipperNumber" => Config::get('ups.account_number'),
                            "Address" => [
                                "AddressLine" => [
                                    Config::get('ups.ship_from_addressLine')
                                ],
                                "City" => Config::get('ups.ship_from_city'),
                                "StateProvinceCode" => Config::get('ups.ship_from_state'),
                                "PostalCode" => Config::get('ups.ship_from_postalCode'),
                                "CountryCode" => "US"
                            ]
                        ],
                        "ShipTo" => [
                            "Name" => $data['customer_name'] ?? "Doe",
                            "AttentionName" => $data['customer_name'] ?? "1160b_74",
                            "Phone" => [
                                "Number" => $data['customer_phone_number'] ?? "1234567890"
                            ],
                            "Address" => [
                                "AddressLine" => 
                                    $data['customer_address_line'] ?? ["26601 ALISO CREEK ROAD, ALISO VIEJO TOWN CENTER"]
                                ,
                                "City" => $data['customer_city'] ?? "ALISO VIEJO",
                                "StateProvinceCode" => $data['customer_state'] ?? "CA",
                                "PostalCode" => $data['customer_zip_code'] ?? "92656",
                                "CountryCode" => "US"
                            ]
                        ],
                        "PaymentInformation" => [
                            "ShipmentCharge" => [
                                "Type" => "01",
                                "BillShipper" => [
                                    "AccountNumber" => Config::get('ups.account_number')
                                ]
                            ]
                        ],
                        "Service" => [
                            "Code" => $request->service_code,
                            "Description" =>  $this->shippingServicesDomestic[$request->service_code]
                        ],
                        "Package" => [
                            "Packaging" => [
                                "Code" => "02",
                                "Description" => "Rate"
                            ],
                            "Dimensions" => [
                                "UnitOfMeasurement" => [
                                    "Code" => "IN",
                                    "Description" => "Inches"
                                ],
                                "Length" => "20",
                                "Width" => "20",
                                "Height" => "20"
                            ],
                            "PackageWeight" => [
                                "UnitOfMeasurement" => [
                                    "Code" => "LBS",
                                    "Description" => "Pounds"
                                ],
                                "Weight" => "10"
                            ]
                        ],
                    ],
                    "LabelSpecification" => [
                        "LabelImageFormat" => [
                            "Code" => "GIF",
                            "Description" => "GIF"
                        ],
                        "HTTPUserAgent" => "Mozilla/4.5",
                        "LabelStockSize" => [
                            "Height" => "6",
                            "Width" => "4"
                        ]
                    ]
                ]
            ];

            // dd($shipment);

            $response = $this->client->request('POST', 'api/shipments/v1/ship', [
                'headers' =>
                [
                    'Authorization' =>  'Bearer ' . $token,
                    'Content-Type' => 'application/json'
                ],
                'json' => $shipment
            ]);
            $result = json_decode($response->getBody());

            // update sale transaction detail shipping status and shipping log
            $saleDetail->shipping_status = 'created';
            $saleDetail->shipping_log = $response->getBody();
            $saleDetail->save();

            // $result = $result->ShipmentResponse->ShipmentResults->PackageResults->ShippingLabel->GraphicImage;

            // refresh the page
            return redirect()->back()->with('success', 'Shipment created successfully');

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $headers = $response->getHeaders();
                $body = $response->getBody()->getContents();
                
                if($statusCode == 401){
                    // refresh token
                    session()->forget('ups_token');
                }
                
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

    public function getLabelImage($sale_detail_id){
        // get shipment log from db
        $saleDetail = SaleTransactionDetail::find($sale_detail_id);
        $shipmentLog = json_decode($saleDetail->shipping_log);

        $image = $shipmentLog->ShipmentResponse->ShipmentResults->PackageResults->ShippingLabel->GraphicImage;

        return response(base64_decode($image))->header('Content-Type', 'image/gif');
    }
}
