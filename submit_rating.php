<?php
$connect = new PDO("mysql:host=localhost;dbname=ecom", "root", "");
session_start();

if (isset($_SESSION['buyerid'])) {
	if (isset($_POST["rating_data"])) {


		$data = array(
			':user_name' => $_POST["user_name"],
			':user_rating' => $_POST["rating_data"],
			':user_review' => $_POST["user_review"],
			':product_id' => $_POST["product_id"],
			':datetimes' => time()
		);

		$query = " INSERT INTO review_table (product_id,user_name, user_rating, user_review, datetime) VALUES (:product_id,:user_name, :user_rating, :user_review, :datetimes)";

		$statement = $connect->prepare($query);

		$statement->execute($data);
		echo "Your Review & Rating Successfully Submitted";

	}


} else {
	echo 'login first';
}
if (isset($_POST["action"])) {

	$productid = $_POST['productid'];
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "SELECT * FROM review_table WHERE product_id = '$productid'  ORDER BY review_id DESC";

	$result = $connect->query($query, PDO::FETCH_ASSOC);
	foreach ($result as $row) {
		$review_content[] = array(
			// 'product_id' => $row["product_id"],
			'user_name' => $row["user_name"],
			'user_review' => $row["user_review"],
			'rating' => $row["user_rating"],
			'datetime' => date('l jS, F ', $row["datetime"])
		);

		if ($row["user_rating"] == '5') {
			$five_star_review++;
		}

		if ($row["user_rating"] == '4') {
			$four_star_review++;
		}

		if ($row["user_rating"] == '3') {
			$three_star_review++;
		}

		if ($row["user_rating"] == '2') {
			$two_star_review++;
		}

		if ($row["user_rating"] == '1') {
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating' => number_format($average_rating, 1),
		'total_review' => $total_review,
		'five_star_review' => $five_star_review,
		'four_star_review' => $four_star_review,
		'three_star_review' => $three_star_review,
		'two_star_review' => $two_star_review,
		'one_star_review' => $one_star_review,
		'review_data' => $review_content
	);

	echo json_encode($output);

}




?>