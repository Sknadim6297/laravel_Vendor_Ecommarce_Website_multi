<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pincode Popup</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            font-family: 'popins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .modal {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .modal-content h2 {
            margin-bottom: 10px;
        }
        .modal-content img {
            width: 200px;
            height: 50px;
            margin-bottom: 10px;
        }
        .modal-content input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .modal-content button {
            background: #007BFF;
            color: white;
            border: none;
            padding: 12px 60px;
            border-radius: 5px;
            cursor: pointer;
        }
        .modal-content button:hover {
            background: black;
        }
        .pincode-container {
            gap: 6px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.pincode-box {
    width: 28px;
    height: 30px;
    text-align: center;
    font-size: 18px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.pincode-box:focus {
    outline: none;
    border-color: #007BFF;
}


    </style>
</head>
<body>
    <div class="modal" id="pincodeModal">
        <div class="modal-content">
            <!-- Logo Image -->
            <img src="{{ asset('frontend/images/logoipsum-362.svg') }}" alt="Logo">
            <h2 style="font-size: unset;">Enter Your Delivery Address</h2>
            @if ($errors->any())
                <p style="color: red;">{{ $errors->first() }}</p>
            @endif
            <form action="{{ route('pincode.save') }}" method="POST">
                @csrf
                <div class="pincode-container">
                    <!-- Create 6 input boxes for the pincode -->
                    <input type="text" name="pincode1" maxlength="1" oninput="moveFocus(this, 1)" class="pincode-box">
                    <input type="text" name="pincode2" maxlength="1" oninput="moveFocus(this, 2)" class="pincode-box">
                    <input type="text" name="pincode3" maxlength="1" oninput="moveFocus(this, 3)" class="pincode-box">
                    <input type="text" name="pincode4" maxlength="1" oninput="moveFocus(this, 4)" class="pincode-box">
                    <input type="text" name="pincode5" maxlength="1" oninput="moveFocus(this, 5)" class="pincode-box">
                    <input type="text" name="pincode6" maxlength="1" oninput="moveFocus(this, 6)" class="pincode-box">
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>
<script>
    function moveFocus(currentInput, index) {
        // If the user types a digit, move to the next input box
        if (currentInput.value.length === 1 && index < 6) {
            document.getElementsByName('pincode' + (index + 1))[0].focus();
        }
    }
</script>
