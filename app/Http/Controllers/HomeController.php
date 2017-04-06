<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\beAnalytics;

use File;
use Google_Client;
use Google_Service_Drive;
use Google_Service_AnalyticsReporting;
use Google_Service_AnalyticsReporting_DateRange;
use Google_Service_AnalyticsReporting_Metric;
use Google_Service_AnalyticsReporting_Dimension;
use Google_Service_AnalyticsReporting_DimensionFilter;
use Google_Service_AnalyticsReporting_DimensionFilterClause;
use Google_Service_AnalyticsReporting_ReportRequest;
use Google_Service_AnalyticsReporting_GetReportsRequest;


class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	 private $analytics;

	public function __construct()
	{
		$this->middleware('auth');
		$this->analytics = new beAnalytics;
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){
		return view('backend.homeBack');
	}

	public function getNewUsersData() {
		return $this->analytics->getNewUsersData();
	}

	public function getDeviceCategoriesData(Request $request) {
		return $this->analytics->getDeviceCategoriesData($request);
    }

    public function getMobileOSData() {
		return $this->analytics->getMobileOSData();
    }

    public function getGenderData() {
		return $this->analytics->getGenderData();
	}

	public function getAgeBracketData() {
		return $this->analytics->getAgeBracketData();
	}
}
