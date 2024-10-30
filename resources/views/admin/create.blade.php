<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .form-submit {
            text-align: right;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            background-color: #f2dede;
            border: 1px solid #e1bcb8;
            padding: 10px;
            border-radius: 4px;
            margin-top: -15px;
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
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
            margin-top: 20px;
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
    <form action="{{route('adminStoreCourses.store')}}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="courseName">Name</label>
        <input type="text" name="name" id="courseName">
        @error('name')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="courseLink">Link</label>
        <input type="text" name="link" id="courseLink">
        @error('link')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="courseDescription">Description</label>
        <input type="text" name="description" id="courseDescription">
        @error('description')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="instructor_id">Select Instructor</label>
        <select name="instructor_id" id="instructor_id" class="form-select">
            <option value="" disabled selected>Select Instructor</option>
            @foreach ($instructors as $instructor)
                <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
            @endforeach
        </select>
        @error('instructor_id')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <div class="buttons">
            <div>
                    <a href="{{ url()->previous() }}" class="back-button">Back</a>
                </div>
            <div class="form-submit">
                <input type="submit" value="Add">
            </div>
        </div>
    </form>
</body>
</html>
