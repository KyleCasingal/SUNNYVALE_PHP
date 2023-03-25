<?php                
$hostname = "localhost";
$username = "root";
$password = "";  
$database = "sunnyvale";   
$con=mysqli_connect($hostname,$username,$password,$database);   
// $display_query = "SELECT * from amenity_renting WHERE cart = 'Approved' ";             
$results = mysqli_query($con,$display_query);   
$count = mysqli_num_rows($results);  
if($count>0) 
{
	$data_arr=array();
    $i=1;
	while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{	
	$data_arr[$i]['transaction_id'] = $data_row['transaction_id'];
	$data_arr[$i]['renter_name'] = $data_row['renter_name'];
	$data_arr[$i]['date_from'] = date("Y-m-d H:i:s", strtotime($data_row['date_from']));
	$data_arr[$i]['date_to'] = date("Y-m-d H:i:s", strtotime($data_row['date_to']));
	$data_arr[$i]['color'] = '#'.substr(uniqid(),-6); // 'green'; pass colour name
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