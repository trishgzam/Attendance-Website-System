<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        background-image: url("Jv.jpg");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
    }

    .banner img {
        max-width: 100%;
        height: auto;
    }
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .calculator {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        input[type="text"], select {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            border: none;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .back-button {
            margin-top: 20px;
            background-color: #555;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .back-button:hover {
            background-color: #555;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Calculator</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="num1" placeholder="Enter First number" required>
            <select name="operator">
                <option value="add">(+)Add</option>
                <option value="subtract">(-)Subtract</option>
                <option value="multiply">(*)Multipy</option>
                <option value="divide">(/) Divide</option>
            </select>
            <input type="text" name="num2" placeholder="Enter Second number" required>
            <input type="submit" name="calculate" value="Calculate">
        </form>

        <?php
        if (isset($_POST['calculate'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operator = $_POST['operator'];

            switch ($operator) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Cannot divide by zero";
                    }
                    break;
                default:
                    $result = "Invalid operator";
                    break;
            }

            echo "<h3>Result: $result</h3>";
        }
        ?>

        <button class="btn btn-dark rounded-0" onclick="goBack()">Back</button>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </div>
</body>
</html>

