	<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="main.css" />

<?php




			 
echo "<center> <font style='color:green;'>Successfully</font> <br />Please wait...<br />Connecting to the Payment Getway<br/>

		<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-right: 16px solid green;
  border-bottom: 16px solid red;
  border-left: 16px solid pink;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>

<div class='loader'></div>

</center>";

header("refresh:5; url='dashboard.php'");

?>