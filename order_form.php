<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>ONLINE ORDER FORM</title>
    <style>
            section .order
            {
                width: 100%
                height: 100vh;
            }

            .order h2
            {
                margin-top: 80px;
                text-align: center;
                margin-bottom: 40px;
            }

            .form
            {
                margin-left: auto;
                margin-right: auto;
                display: block;
                width: 100%;
                margin-top: 50px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 400px;
            }

            .form input
            {
                width: 100%;
                margin-bottom: 30px;
                border: none;
                border-bottom: 2px solid #30475e;
                border-radius: 0;
                padding: 1px 0;
                font-weight: 550;
                font-size: 14px;
                outline: 2px solid #30475e;
                padding: 8px;
                border-radius: 3px;
            }

            .form textarea
            {
                width: 100%;
                margin-bottom: 20px;
                border: none;
                border-bottom: 2px solid #30475e;
                border-radius: 0;
                padding: 1px 0;
                font-weight: 550;
                font-size: 14px;
                outline: 2px solid #30475e;
                padding: 8px;
                border-radius: 3px;
            }

            .form button
            {
                font-weight: 550;
                font-size: 15px;
                color: white;
                background-color: #30475e;
                padding: 10px 15px;
                border: none;
                outline: none;
                margin-top: 5px;
                border-radius: 3px;
            }
    </style>
</head>
<body>
    <section class="order" id="orders">
        <form class="form" method="POST" action="orders.php">
            <h2>
                <span>ONLINE ORDER FORM</span>
            </h2>
                <input type="text" placeholder="Full Name" name="fullname" required>
                <input type="text" placeholder="Car Name" name="carname" required>
                <input type="email" placeholder="E-mail" name="email" required>
                <textarea placeholder="Address" name="address" rows="5" cols="50" required></textarea> 
                <input type="" placeholder="Contact No." name="contact_no" required>
                <button type="submit" name="order">SUBMIT</button>
        </form>
    </section>
</body>
</html>