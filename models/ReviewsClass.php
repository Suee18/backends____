<?php
include_once "../../app/config/db_config.php";

class Reviews
{
    public $id;
    public $review_text;

    public $review_date;

    public $review_user_name;

    function __construct($review_text, $review_date, $review_user_name)
    {
        $this->review_text = $review_text;
        $this->review_date = $review_date;
        $this->review_user_name = $review_user_name;
    }

    function setID($id)
    {
        $this->id = $id;
    }

    static function get_all_reviews()
    {
        global $conn;
        $sql = "SELECT * FROM reviews";
        $result = mysqli_query($conn, $sql);
        $reviews = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $review = new Reviews($row["review_text"], $row["review_date"], $row["review_user_name"]);
                $review->id = $row["id"];
                array_push($reviews, $review);
            }
        }
        return $reviews;
    }

    function addReviewIntoDB($review)
    {
        global $conn;
        $sql = "INSERT INTO reviews (review_text, review_date, review_user_name) VALUES ('$review->review_text', '$review->review_date', '$review->review_user_name')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function deleteReviewFromDB($review_id)
    {
        global $conn;
        $sql = "DELETE FROM reviews WHERE id = '$review_id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }


}