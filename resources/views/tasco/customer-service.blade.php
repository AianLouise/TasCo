<x-app-layout>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Customer Service</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        label {
            display: block;
            margin-bottom: 8px;
        }
        
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        textarea {
            resize: vertical;
            height: 120px;
        }
        
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contact Customer Service</h2>
        <form action="{{ route('user.EmailSent') }}" method="post">
            @csrf
    
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>
    
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
    
            <input type="submit" id="submitBtn" value="Submit Message">
        </form>
    </div>
    
</body>
</html>

<script>
    document.getElementById('submitBtn').addEventListener('click', function() {
        this.disabled = true;
        this.form.submit();
    });
</script>

</x-app-layout>