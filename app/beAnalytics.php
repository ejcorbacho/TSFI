<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

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


class beAnalytics extends Model
{

	public function getNewUsersData() {
		$analytics = $this->initializeAnalytics();
    	$monthArray = $this->getMonthArray();
    	$data = array();
    	for ($i = 0; $i < count($monthArray); $i++) {
			$response = $this->getNewUsersReport($analytics, $monthArray[$i]);
			array_push($data, $this->printResults($response));
		}
		return json_encode($data);
	}

	public function getDeviceCategoriesData(Request $request) {
		$metrics = $request->input('data');
		$analytics = $this->initializeAnalytics();
		$response = $this->getDeviceCategoriesReport($analytics,$metrics);
		$data = $this->printResults($response);
    	return json_encode($data);
    }

    public function getMobileOSData() {
		$analytics = $this->initializeAnalytics();
		$response = $this->getMobileOSReport($analytics);
		$data = $this->printResults($response);
		return json_encode($data);
    }

    public function getGenderData() {
		$analytics = $this->initializeAnalytics();
		$response = $this->getGenderReport($analytics);
		$data = $this->printResults($response);
		return json_encode($data);
	}

	public function getAgeBracketData() {
		$analytics = $this->initializeAnalytics();
		$response = $this->getAgeBracketReport($analytics);
		$data = $this->printResults($response);
		return json_encode($data);
	}

	public function getPostViews($postId) {
        $analytics = $this->initializeAnalytics();
        $response = $this->getPostViewsReport($analytics, $postId);
        $data = $this->printResults($response);
        return $data;
    }

	public function initializeAnalytics() {
	  // Creates and returns the Analytics Reporting service object.

	  // Use the developers console and download your service account
	  // credentials in JSON format. Place them in this directory or
	  // change the key file location if necessary.
	  $KEY_FILE_LOCATION = app_path() . '/Http/Controllers/Analytics/service-account-credentials.json';

	  // Create and configure a new client object.
	  $client = new Google_Client();
	  $client->setApplicationName("TSFI");
	  $client->setAuthConfig($KEY_FILE_LOCATION);
	  $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
	  $analytics = new Google_Service_AnalyticsReporting($client);

	  return $analytics;
	}

	public function getNewUsersReport($analytics, $monthStartEnd) {
		$VIEW_ID = "142023546";

		// Create the DateRange object.
		$dateRange = new Google_Service_AnalyticsReporting_DateRange();
		$dateRange->setStartDate($monthStartEnd[0]);
		$dateRange->setEndDate($monthStartEnd[1]);

		// Create the Metrics object.
		$sessions = new Google_Service_AnalyticsReporting_Metric();
		$sessions->setExpression("ga:sessions");
		$sessions->setAlias("sessions");

		$users = new Google_Service_AnalyticsReporting_Metric();
        $users->setExpression("ga:users");
        $users->setAlias("users");

		// Create the ReportRequest object.
		$request = new Google_Service_AnalyticsReporting_ReportRequest();
		$request->setViewId($VIEW_ID);
		$request->setDateRanges($dateRange);
		$request->setMetrics(array($users, $sessions));
		$request->setIncludeEmptyRows(true);

		$body = new Google_Service_AnalyticsReporting_GetReportsRequest();
		$body->setReportRequests($request);
		return $analytics->reports->batchGet($body);
	}

	public function getDeviceCategoriesReport($analytics, $metricsString) {
		$VIEW_ID = "142023546";

		// Create the DateRange object.
		$dateRange = new Google_Service_AnalyticsReporting_DateRange();
		$dateRange->setStartDate('30daysAgo');
		$dateRange->setEndDate('today');

		// Create the Metrics object.
		$metrics = new Google_Service_AnalyticsReporting_Metric();
		$metrics->setExpression("ga:".$metricsString);
		$metrics->setAlias($metricsString);

		// Create the Dimensions object.
		$deviceCategory = new Google_Service_AnalyticsReporting_Dimension();
		$deviceCategory->setName("ga:deviceCategory");

		// Create the ReportRequest object.
		$request = new Google_Service_AnalyticsReporting_ReportRequest();
		$request->setViewId($VIEW_ID);
		$request->setDateRanges($dateRange);
		$request->setMetrics($metrics);
		$request->setDimensions($deviceCategory);
		$request->setIncludeEmptyRows(true);

		$body = new Google_Service_AnalyticsReporting_GetReportsRequest();
		$body->setReportRequests($request);
		return $analytics->reports->batchGet($body);
	}

	public function getMobileOSReport($analytics) {
		$VIEW_ID = "142023546";

		// Create the DateRange object.
		$dateRange = new Google_Service_AnalyticsReporting_DateRange();
		$dateRange->setStartDate('30daysAgo');
		$dateRange->setEndDate('today');

		$users = new Google_Service_AnalyticsReporting_Metric();
		$users->setExpression("ga:users");
		$users->setAlias("users");

		// Create the Dimensions object.
		$operatingSystem = new Google_Service_AnalyticsReporting_Dimension();
		$operatingSystem->setName("ga:operatingSystem");

		$deviceCategory = new Google_Service_AnalyticsReporting_Dimension();
		$deviceCategory->setName("ga:deviceCategory");

		// Create the DimensionFilter.
		$mobileFilter = new Google_Service_AnalyticsReporting_DimensionFilter();
		$mobileFilter->setDimensionName('ga:deviceCategory');
		$mobileFilter->setOperator('EXACT');
		$mobileFilter->setExpressions(array('mobile'));

		// Create the DimensionFilterClauses
		$mobileFilterClause = new Google_Service_AnalyticsReporting_DimensionFilterClause();
		$mobileFilterClause->setFilters(array($mobileFilter));

		// Create the ReportRequest object.
		$request = new Google_Service_AnalyticsReporting_ReportRequest();
		$request->setViewId($VIEW_ID);
		$request->setDateRanges($dateRange);
		$request->setMetrics(array($users));
		$request->setDimensions(array($operatingSystem, $deviceCategory));
		$request->setDimensionFilterClauses(array($mobileFilterClause));
		$request->setIncludeEmptyRows(true);

		$body = new Google_Service_AnalyticsReporting_GetReportsRequest();
		$body->setReportRequests($request);
		return $analytics->reports->batchGet($body);
    }

	public function getGenderReport($analytics) {
		$VIEW_ID = "142023546";

		// Create the DateRange object.
		$dateRange = new Google_Service_AnalyticsReporting_DateRange();
		$dateRange->setStartDate('30daysAgo');
		$dateRange->setEndDate('today');

		$users = new Google_Service_AnalyticsReporting_Metric();
		$users->setExpression("ga:users");
		$users->setAlias("users");

		// Create the Dimensions object.
		$userGender = new Google_Service_AnalyticsReporting_Dimension();
		$userGender->setName("ga:userGender");

		// Create the ReportRequest object.
		$request = new Google_Service_AnalyticsReporting_ReportRequest();
		$request->setViewId($VIEW_ID);
		$request->setDateRanges($dateRange);
		$request->setMetrics(array($users));
		$request->setDimensions(array($userGender));
		$request->setIncludeEmptyRows(true);

		$body = new Google_Service_AnalyticsReporting_GetReportsRequest();
		$body->setReportRequests($request);
		return $analytics->reports->batchGet($body);
	}

	public function getAgeBracketReport($analytics) {
		$VIEW_ID = "142023546";

		// Create the DateRange object.
		$dateRange = new Google_Service_AnalyticsReporting_DateRange();
		$dateRange->setStartDate('30daysAgo');
		$dateRange->setEndDate('today');

		$users = new Google_Service_AnalyticsReporting_Metric();
		$users->setExpression("ga:users");
		$users->setAlias("users");

		// Create the Dimensions object.
		$userAgeBracket = new Google_Service_AnalyticsReporting_Dimension();
		$userAgeBracket->setName("ga:userAgeBracket");

		// Create the ReportRequest object.
		$request = new Google_Service_AnalyticsReporting_ReportRequest();
		$request->setViewId($VIEW_ID);
		$request->setDateRanges($dateRange);
		$request->setMetrics(array($users));
		$request->setDimensions(array($userAgeBracket));
		$request->setIncludeEmptyRows(true);

		$body = new Google_Service_AnalyticsReporting_GetReportsRequest();
		$body->setReportRequests($request);
		return $analytics->reports->batchGet($body);
	}

    public function getPostViewsReport($analytics, $postId) {
        $VIEW_ID = "142023546";

        // Create the DateRange object.
        $dateRange = new Google_Service_AnalyticsReporting_DateRange();
        $dateRange->setStartDate('2005-01-01');
        $dateRange->setEndDate('today');

        $views = new Google_Service_AnalyticsReporting_Metric();
        $views->setExpression("ga:pageviews");
        $views->setAlias("views");

        // Create the Dimensions object.
        $page = new Google_Service_AnalyticsReporting_Dimension();
        $page->setName("ga:pagePath");

        // Create the DimensionFilter.
        $pageFilter = new Google_Service_AnalyticsReporting_DimensionFilter();
        $pageFilter->setDimensionName('ga:pagePath');
        $pageFilter->setOperator('REGEXP');
        $pageFilter->setExpressions(array('/tsfi/public/post/' . $postId . '$'));

        // Create the DimensionFilterClauses
        $pageFilterClause = new Google_Service_AnalyticsReporting_DimensionFilterClause();
        $pageFilterClause->setFilters(array($pageFilter));

        // Create the ReportRequest object.
        $request = new Google_Service_AnalyticsReporting_ReportRequest();
        $request->setViewId($VIEW_ID);
        $request->setDateRanges($dateRange);
        $request->setMetrics(array($views));
        $request->setDimensions(array($page));
        $request->setDimensionFilterClauses(array($pageFilterClause));
        $request->setIncludeEmptyRows(true);

        $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
        $body->setReportRequests($request);
        return $analytics->reports->batchGet($body);
    }

	public function printResults($reports) {
		$dataArray = array();
		$dimensionsArray = array();
		$metricsArray = array();
		for ( $reportIndex = 0; $reportIndex < count( $reports ); $reportIndex++ ) {
			$report = $reports[ $reportIndex ];
			$header = $report->getColumnHeader();
			$dimensionHeaders = $header->getDimensions();
			$metricHeaders = $header->getMetricHeader()->getMetricHeaderEntries();
			$rows = $report->getData()->getRows();

			for ( $rowIndex = 0; $rowIndex < count($rows); $rowIndex++) {
				$row = $rows[ $rowIndex ];
				$dimensions = $row->getDimensions();
				$metrics = $row->getMetrics();

				//for ($i = 0; $i < count($dimensionHeaders) && $i < count($dimensions); $i++) {
				for ($i = 0; $i < count($dimensions); $i++) {
					//return($dimensionHeaders[$i] . ": " . $dimensions[$i] . "\n");
					array_push($dimensionsArray, $dimensions[$i]);
				}

				for ($j = 0; $j < count($metricHeaders) && $j < count($metrics); $j++) {
					$entry = $metricHeaders[$j];
					$values = $metrics[$j];
					for ( $valueIndex = 0; $valueIndex < count( $values->getValues() ); $valueIndex++ ) {
						$value = $values->getValues()[ $valueIndex ];
						$name = $entry->getName();

						array_push($metricsArray, $value);
					}
				}
			}
		}
		return $metricsArray;
	}

	public function getMonthArray() {
		$year = date("Y");
		$month = date("m");
		$monthArray = [];
		$monthStartEnd = [];
		$n = 5;
        while ($n >= 0) {
			if (($month-$n) < 1) {
				$date = ($year-1) . sprintf("%02d", ($month-$n+11)) . "01";
				$monthStartEnd = [date("Y-m-d", strtotime($date)), date("Y-m-t", strtotime($date))];
				array_push($monthArray, $monthStartEnd);
			} else {
				$date = ($year) . sprintf("%02d", ($month-$n)) . "01";
				$monthStartEnd = [date("Y-m-d", strtotime($date)), date("Y-m-t", strtotime($date))];
				array_push($monthArray, $monthStartEnd);
			}
			--$n;
        }
        return $monthArray;
	}
}
