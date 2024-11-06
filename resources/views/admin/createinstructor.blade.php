<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Instructor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        form {
            max-width: 500px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        form:hover {
            transform: scale(1.02);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 5px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .form-submit {
            text-align: right;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            display: inline-block;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .gender-group {
            margin-bottom: 20px;
        }

        .gender-group label {
            margin-right: 15px;
        }

        .back-button {
            display: inline-block;
            background-color: black;
            color: white;
            padding: 10px 20px;
            text-align: center;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #333;
        }

        .buttons{
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <form action="{{ route('adminStoreInstructor.store') }}" method="POST">
        @csrf
        <!-- @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
        <label for="instructorName">Name</label>
        <input type="text" name="name" id="instructorName" required>
        @error('name')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="instructorEmail">Email</label>
        <input type="email" name="email" id="instructorEmail" required>
        @error('email')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="instructorPassword">Password</label>
        <input type="password" name="password" id="instructorPassword" required>
        @foreach ($errors->get('password') as $error)
            <div class="error-message">{{ $error }}</div>
        @endforeach

        <label for="instructorPhoneNumber">Phone Number</label>
        <input type="text" name="phonenumber" id="instructorPhoneNumber" pattern="\d{11}" maxlength="11" placeholder="Enter exactly 11 digits">
        @error('phonenumber')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="instructorGender">Gender</label>
        <div class="gender-group">
            <input type="radio" name="gender" id="male" value="male" required>
            <label for="male">Male</label>

            <input type="radio" name="gender" id="female" value="female" required>
            <label for="female">Female</label>
        </div>
        @error('gender')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="course_id">Select Course</label>
        <select name="course_id" id="course_id" class="form-select" >
            <option value="" disabled selected>Select Instructor Course</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
        @error('course_id')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <div class="buttons">
            <div style="margin-top: 20px;">
                <a href="{{ url()->previous() }}" class="back-button">Back</a>
            </div>
            <div class="form-submit">
                <input type="submit" value="Add">
            </div>
        </div>
    </form>
</body>
</html>
