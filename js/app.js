(function () {
  'use strict';

  var app = angular.module('examples', ['chart.js', 'ui.bootstrap']);


  app.config(function (ChartJsProvider) {
    // Configure all charts
    ChartJsProvider.setOptions({
      colors: ['#97BBCD', '#DCDCDC', '#F7464A', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360']
    });
    // Configure all doughnut charts
    ChartJsProvider.setOptions('doughnut', {
      cutoutPercentage: 60
    });
    ChartJsProvider.setOptions('bubble', {
      tooltips: { enabled: false }
    });
  });

  app.controller('anaSayfa', ['$scope', '$interval', '$http', function ($scope, $interval, $http) {//EnYuksekIsıkCtrl
	  
	  
	var sehirler = [0, 0, 0, 0];
	$scope.labels = [];//'1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25'];
	$scope.series = ['İstanbul', 'Ankara', 'İzmir', 'Kocaeli'];//, 'İzmir'];
	
	$interval(function(){
		$http({
			method: 'GET',
			url: 'http://emrahgumus.com/GunesPaneli/veri_cek.php',
		}).then(function successCallback(response) {
			//$scope.data[0] = [];

			var dizi = angular.fromJson(response).data;

			//if($scope.data[0].length < dizi.length){
			$scope.data = [[1],[1],[1],[1]];
			
			for(var i=0; i < dizi[0]['data'].length; i++){
				//$scope.labels[i] = i+10;
				var say = 0;
				
				if(sehirler[0] == 1){
					$scope.data[say][i] = dizi[say]['data'][(dizi[say]['data'].length-i-1)]['gerilim'];
					say++;
				}else{
					//$scope.data[0] = [];
				}
				
				if(sehirler[1] == 1){
					$scope.data[say][i] = dizi[say]['data'][(dizi[say]['data'].length-i-1)]['gerilim'];
					say++;
				}else{
					//$scope.data[1] = [];
				}
				
				if(sehirler[2] == 1){
					$scope.data[say][i] = dizi[say]['data'][(dizi[say]['data'].length-i-1)]['gerilim'];
					say++;
				}else{
					//$scope.data[2] = [];
				}
				
				if(sehirler[3] == 1){
					$scope.data[say][i] = dizi[say]['data'][(dizi[say]['data'].length-i-1)]['gerilim'];
					say++;
				}else{
					//$scope.data[3] = [];
				}
				
				//$scope.series[i] = dizi[i]['name'];
				$scope.labels[i] = i;
			}

			/*}else{
			$scope.data[0][dizi.length-1] = dizi[0]['gerilim'];
			}*/
			console.log($scope.data);
		}, function errorCallback(response) {
			// called asynchronously if an error occurs
			// or server returns response with an error status.
		});
	}, 1000);
    
	
    $scope.data = [
      [1],
      [1],
      [1],
      [1],
      //[28, 48, 40, 19, 86, 27, 90],
      //[9, 21, 18, 9, 2, 27, 55]
    ];
	//$scope.series = ['Akım', 'Ankara'];//, 'İzmir'];
	
    $scope.onClick = function (points, evt) {
      console.log(points, evt);
    };
    $scope.onHover = function (points) {
      if (points.length > 0) {
        console.log('Point', points[0].value);
      } else {
        console.log('No point');
      }
    };

    $scope.datasetOverride = [{ yAxisID: 'y-axis-1' }]//, { yAxisID: 'y-axis-2' }];

    $scope.options = {
      scales: {
        yAxes: [
          {id: 'y-axis-1', type: 'linear', display: true, position: 'left'},
          //{id: 'y-axis-2', type: 'linear', display: true, position: 'right'}
        ]
      }
    };

    $scope.sehir = "ist";

   /* io.connect('http://192.168.1.102:4000')
      .on('oda1', function(data){

        $scope.sehir = parseInt(data.gonderilenVeri);//"degisti";
		
        $scope.data[1][1] = parseInt(data.gonderilenVeri);

        //console.log(parseInt(data.gonderilenVeri));

      });*/

    /*$interval(function () {
      //console.log("www");
      getLiveChartData();
    }, 5000);*/

    function getLiveChartData () {
	  

    }

      $scope.sehir = $scope.sehir;
	  
	$scope.sehir = "istnbul";

	$scope.sehirGoster = function($a){
	  $scope.sehir = $a;
	  sehirler[$a] = (sehirler[$a]+1)%2;
	  console.log(sehirler);
	  
	}
	  
	  
	  
	  
  }]);


  /*app.controller('SolButonlar', ['$scope', function ($scope) {

    $scope.sehir = "istnbul";
    
    $scope.sehirGoster = function($a){
      $scope.sehir = $a;
    }

  }]);*/


})();

