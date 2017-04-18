<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notificaciones;

use App\beAnalytics;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	private $analytics;
	private $onotificaciones;

	public function __construct()
	{
		$this->middleware('auth');
		$this->analytics = new beAnalytics;
    $this->onotificaciones = new Notificaciones;
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){

    $notificaciones = $this->onotificaciones->leerTodas();

		return view('backend.homeBack', ['notificaciones'=>$notificaciones]);
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
