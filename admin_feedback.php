<?php
include 'config.php'; // Include your database connection code

// Function to delete feedback by ID
if (isset($_POST['deleteFeedback'])) {
    $feedbackId = $_POST['feedbackId'];
    $deleteQuery = "DELETE FROM tbl_feedback WHERE feedback_id = $feedbackId";
    if (mysqli_query($connection, $deleteQuery)) {
        // Feedback deleted successfully
        header("Location: admin_feedback.php"); // Redirect to the feedback page
        exit();
    } else {
        // Handle the error
        echo "Error deleting feedback: " . mysqli_error($connection);
    }
}

// Fetch feedback from the database
$query = "SELECT * FROM tbl_feedback";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Feedback</title>
    <link rel="stylesheet" type="text/css" href="AdminPageStyle.css">
    <style>
        .feedback-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .feedback-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            text-align: left;
        }

        .feedback-description {
            font-size: 16px;
            margin-top: 10px;
            text-align: left;
        }
        .delete-button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s; /* Add a transition effect */
        }

        .delete-button:hover {
            background-color: #d32f2f; /* Change the background color on hover */
        }
        .button {
            background-color: #3498db; /* Default background color */
            color: #fff; /* Default text color */
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s; /* Transition effect on hover */
        }

        .button:hover {
            background-color: #2980b9; /* New background color on hover */
            color: #fff; /* New text color on hover */
        }
    </style>
</head>
<body>
    <div class="feedback-container">
        <h1>Admin Feedback</h1>
        <h2>Feedback from Users</h2>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="feedback-item">';
            echo "<strong>Feedback ID:</strong> {$row['feedback_id']}<br>";
            echo "<strong>Username:</strong> {$row['Username']}<br>";
            echo "<strong>Email:</strong> {$row['UserEmail']}<br>";
            echo '<div class="feedback-description">';
            echo "<strong>Feedback:</strong><br>{$row['feedback']}";
            echo '</div>';
            // Add a delete button
            echo '<form method="post" action="">
                    <input type="hidden" name="feedbackId" value="' . $row['feedback_id'] . '">
                    <button type="submit" class="delete-button" name="deleteFeedback">Delete</button>
                </form>';
            echo '</div>';
        }
        ?>
    </div>
    <a href="AdminPage.php" class="button">Back to Admin Page</a>
</body>
</html>
