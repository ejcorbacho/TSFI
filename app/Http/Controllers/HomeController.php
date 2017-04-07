<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\beAnalytics;

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
