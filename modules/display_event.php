<?php                
$hostname = "localhost";
$username = "root";
$password = "";
$database = "sunnyvale";
$con = mysqli_connect($hostname, $username, $password, $database);
$display_query = "SELECT transaction_id AS id, CONCAT(renter_name, ' ', subdivision_name, ' ', amenity_name) AS title, date_from AS start, date_to AS end FROM amenity_renting WHERE cart = 'Approved';  ";          
$results = mysqli_query($con,$display_query);   
$count = mysqli_num_rows($results);  
if($count>0) 
{
	$data_arr=array();
    $i=1;
	while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{	
	$data_arr[$i]['id'] = $data_row['id'];
	$data_arr[$i]['title'] = $data_row['title'];
	$data_arr[$i]['start'] = date("Y-m-d H:i:s", strtotime($data_row['start']));
	$data_arr[$i]['end'] = date("Y-m-d H:i:s", strtotime($data_row['end']));
	// $data_arr[$i]['color'] = '#'.substr(uniqid(),-6); // 'green'; pass colour name
	$i++;
	}
	
	$data = array(
                'status' => true,
                'msg' => 'successfully!',
				'data' => $data_arr
            );
}
else
{
	$data = array(
                'status' => false,
                'msg' => 'Error!'				
            );
}
echo json_encode($data);
?>