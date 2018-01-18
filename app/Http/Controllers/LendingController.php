<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LendingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    private $privateKey = '';
    private $long = "longTermPackage";
    private $short = "shortTermPackage";

    protected $longTermPackage = [
        "package1" => [
            "min" => 100,
            "max" => 2000,
            "bonus" => 25,
            "duration" => 10,
        ],
        "package2" => [
            "min" => 2000,
            "max" => 30000,
            "bonus" => 25,
            "duration" => 8,
        ],
        "package3" => [
            "min" => 30000,
            "max" => 200000,
            "bonus" => 25,
            "duration" => 6,
        ],
    ];
    protected $shortTermPackage = [
        "package1" => [
            "min" => 100,
            "max" => 100000,
            "bonus" => 25,
            "duration" => 1,
        ],
    ];

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    private function getUserPackage($package, $term)
    {
        if( empty($package) || empty($term)){
            return null;
        }

        switch ($term) {
            case $this->long:
                $userTerm = $this->longTermPackage;
                break;
            case $this->short:
                $userTerm = $this->shortTermPackage;
                break;
            default:
                return null;
        }

        return in_array($package, $userTerm) ? $userTerm[$package] : null;
    }

    private function depositIsValid(array $package, $deposit)
    {
        return $deposit < $package['min'] || $deposit > $package['max'] ? false : true;
    }

    private function requestParametersIsValid()
    {
        if ($this->requestIsValid() && $this->requestHas(['key'])){
            if ($this->privateKey == $this->requestValueOf('key')){
                return true;
            }
        }
        return false;
    }

    private function createDepositRecord($package, $deposit, $term)
    {
        $authUserId = Auth::user()->id;
        $userPackage = $this->getUserPackage($package, $term);
        $dueDate = Carbon::now()->addMonths($userPackage['duration']);
        $userDepositRecord = [
            'term' => $term,
            'package' => $package,
            'deposit' => $deposit,
            'due_date' =>  $dueDate,
            'user_id' => $authUserId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deposit_date' => Carbon::now(),
            'bonus' => $userPackage['bonus'],
            'duration' => $userPackage['duration'],
        ];
        return $this->attemptDeposit($userDepositRecord);
    }

    private function attemptDeposit($userDepositRecord)
    {
        try{
            return Deposit::create($userDepositRecord);
        }catch(Exception $exception){
//            dd($exception);
            return $this->eMessage(["Server error", 500]);
        }
    }

    public function processDepositRequest(Request $request)
    {
        if (!$this->requestParametersIsValid()){
            return $this->eMessage(['Unauthorized Request', 401]);
        }

        $term = $request->input('term');
        $deposit = $request->input('deposit');
        $package = $request->input('package');

        $userPackage = $this->getUserPackage($package, $term);

        if ($userPackage != null){
            if ($this->depositIsValid($userPackage, $deposit)){
                $record = $this->createDepositRecord($package, $deposit, $term);
                if($record === isInstanceOf('Transfer')){
                    return $this->sMessage(['Transfer successful', 200]);
                }else{
                    return $this->sMessage(['Internal Server Error', 500]);
                }
            }else{
                return $this->eMessage(['Invalid Amount Entered', 400]);
            }
        }
        return $this->eMessage(['Invalid Request', 400]);
    }

    ///////////////--SUCCESS MESSAGE--///////////////
    private function sMessage($message)
    {
        return response()->json(
            $message[0],
            $message[1]
        );
    }
    ///////////////--ERROR MESSAGE--///////////////
    private function eMessage($message)
    {
        return response()->json(
            $message[0],
            $message[1]
        );
    }

    ///////////////////////------HELPER FUNCTION CALL------/////////////////////////

    private function requestIsValid()
    {
        foreach ($_REQUEST as $index => $item) {
            if (empty($item)){
                return false;
            }
        }
        return true;
    }

    private function requestHas($requestArray)
    {
        foreach ($requestArray as $item) {
            if(!in_array($item, $this->requestKeys($_REQUEST))){
                return false;
            }
        }
        return true;
    }

    private function requestKeys($requestArray)
    {
        $arrayKeys = [];
        foreach ($requestArray as $index => $item) {
            array_push($arrayKeys, $index);
        }
        return $arrayKeys;
    }

    private function requestValueOf($requestKey)
    {
        foreach ($_REQUEST as $index => $item) {
            if ($requestKey == $index){
                return $item;
            }
        }
        return null;
    }

    private function getRequestValue($requestKey)
    {
        foreach ($_REQUEST as $index => $item) {
            if ($requestKey == $index){
                return [$requestKey => $item];
            }
        }
        return null;
    }
}
