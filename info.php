<?php include("include/header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Bo

        /* Section Styling */
        section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, #2b5876, #4e4376);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 900px;
            color: white;
            transform: translateY(30px);
            opacity: 0;
            animation: fadeInUp 1.2s ease-out forwards;
            margin-top: 20px;
            margin-left:350px; /* Add a margin to separate from the top of the page */
        }

        /* Left Side Text Styling */
        .text-container {
            max-width: 50%;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #f1f1f1;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #e6e6e6;
            margin-bottom: 20px;
        }

        /* Right Side Image Styling */
        img {
            max-width: 40%;
            border-radius: 12px;
            transition: transform 0.3s ease-in-out;
        }

        /* Hover effect on Image */
        img:hover {
            transform: scale(1.1);
        }

        /* Animation for Section */
        @keyframes fadeInUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <section>
        <div class="text-container">
            <h1>Information</h1>
            <p>
                The application will centralize patient information, evaluate treatment effectiveness, and provide tools for the daily management of medical data. It will be user-friendly, secure, and offer quick access to vital information for healthcare professionals.
            </p>
        </div>
        <img src="img/healthcare.jpg" alt="healthcare">
    </section>
</body>
</html>
