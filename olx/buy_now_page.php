<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Now</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: black;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .back-button {
            background-color: #fff;
            color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            text-decoration: none;
        }

        main {
            padding: 20px;
        }

        .buyer-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .buyer-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .buyer-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .buyer-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <a href="javascript:history.back()" class="back-button">Back</a>
    </header>
    
    <main>
        <div class="buyer-form">
            <h2>Buyer Information</h2>
            <form id="buyer-info-form">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <button type="submit">Submit Enquiry</button>
            </form>
        </div>
    </main>

    <script>
        // JavaScript code to display a prompt when the form is submitted
        document.getElementById('buyer-info-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the form from actually submitting

            // Display a prompt message to the user
            alert("Your enquiry has been submitted to the owner. The owner will reach out to you soon.");

            // Optionally, you can reset the form after displaying the prompt
            this.reset();
        });
    </script>
</body>
</html>