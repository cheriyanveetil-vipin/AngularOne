<?php 


$app->get('/session', function() {
    $db = new DbHandler();
    $session = $db->getSession();
    $response["uid"] = $session['uid'];
    $response["email"] = $session['email'];
    $response["name"] = $session['name'];
	$response["isadmin"] = (isset($session['isadmin'])?$session['isadmin'] :'');
	
    echoResponse(200, $session);
});

$app->post('/login', function() use ($app) {
    require_once 'passwordHash.php';
    $r = json_decode($app->request->getBody());
    verifyRequiredParams(array('email', 'password'),$r->customer);
    $response = array();
    $db = new DbHandler();
    $password = $r->customer->password;
    $email = $r->customer->email;
    $user['Email']="admin";
	$user['Password']="admin";
	$user['ID']="1";
	$user['Firstname']="Admin";
	$user['IsAdmin']="1";
    if ($user != NULL) {
        //if(passwordHash::check_password($user['password'],$password)){
		if($user['Password']==$password && $user['Email']==$email)
		{
				
			$response['status'] = "success";
			$response['message'] = 'Logged in successfully.';
			$response['name'] = $user['Firstname'];
			$response['uid'] = $user['ID'];
			$response['email'] = $user['Email'];
			if (!isset($_SESSION)) {
				session_start();
			}
			$_SESSION['uid'] = $user['ID'];
			$_SESSION['email'] = $user['Email'];
			$_SESSION['name'] = $user['Firstname'];
			$_SESSION['isadmin'] = $user['IsAdmin'];
        } else {
            $response['status'] = "error";
            $response['message'] = 'Login failed. Incorrect credentials';
        }
    }else {
            $response['status'] = "error";
            $response['message'] = 'No such user is registered';
        }
    echoResponse(200, $response);
});

$app->get('/logout', function() {
    $db = new DbHandler();
    $session = $db->destroySession();
    $response["status"] = "info";
    $response["message"] = "Logged out successfully";
    echoResponse(200, $response);
});


$app->get('/sampleHightChartData', function() use ($app)  {
    
    $results['Data'] = "{
				chart: {
					renderTo: 'HighCharData',
					type: 'column'
				},
				title: {
					text: 'Stacked column chart'
				},
				xAxis: {
					categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Total fruit consumption'
					},
					stackLabels: {
						enabled: true,
						style: {
							fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
						}
					}
				},
				legend: {
					align: 'right',
					x: -30,
					verticalAlign: 'top',
					y: 25,
					floating: true,
					backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
					borderColor: '#CCC',
					borderWidth: 1,
					shadow: false
				},
				tooltip: {
					headerFormat: '<b>{point.x}</b><br/>',
					pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
				},
				plotOptions: {
					column: {
						stacking: 'normal',
						dataLabels: {
							enabled: true,
							color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
							style: {
								textShadow: '0 0 3px black'
							}
						}
					}
				},
				series: [{
					name: 'John',
					data: [5, 3, 4, 7, 2]
				}, {
					name: 'Jane',
					data: [2, 2, 3, 2, 1]
				}, {
					name: 'Joe',
					data: [3, 4, 4, 2, 5]
				}]
			}";
    
    echoResponse(200, ($results));
	//echo $results;
});
?>