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

        .error-message {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 0, 0, 0.1); /* Light red overlay */
            color: #cc0000; /* Red text for emphasis */
            font-size: 18px;
            padding: 10px;
            border: 1px solid #cc0000;
            border-radius: 5px;
            margin-bottom: 15px;
            width: 90%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            /* width: 400px; Matches the width of the input field */
            margin-top: 5px;
        }

        .error-message ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <form action="{{route('adminUpdateInstructor.update',$instructor->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="instructorName">Name</label>
        <input type="text" name="name" id="instructorName" value="{{$instructor->name}}">
        @error('name')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="instructorEmail">Email</label>
        <input type="email" name="email" id="instructorEmail" value="{{$instructor->email}}">
        @error('email')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="instructorPassword">Password</label>
        <input type="password" name="password" id="instructorPassword" value="{{$instructor->password}}">
        @foreach ($errors->get('password') as $error)
            <div class="error-message">{{ $error }}</div>
        @endforeach

        <label for="instructorPhoneNumber">Phone Number</label>
        <input type="text" name="phonenumber" id="instructorPhoneNumber" value="{{$instructor->phonenumber}}">
        @error('phonenumber')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="instructorGender">Gender</label>
        <div>
            <input type="radio" name="gender" id="male" value="male" {{ $instructor->gender == 'male' ? 'checked' : ''}}>
            <label for="male">Male</label>

            <input type="radio" name="gender" id="female" value="female" {{ $instructor->gender == 'female' ? 'checked': '' }}>
            <label for="female">Female</label>
        </div>
        @error('gender')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <select class="form-select" aria-label="Default select example" name="course_id">
            <option value="" {{ is_null($instructor->course) ? 'selected' : '' }}>Not Yet</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}"
                    {{ $instructor->course && $course->id == $instructor->course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                    {{ $instructor->course && $course->id == $instructor->course->id ? '(Currently Assigned)' : '' }}
                </option>
            @endforeach
        </select>
        @error('course_id')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <div class="buttons">
            <div>
                <a href="{{ route('adminsinstructor-page') }}" class="back-button">Back</a>
            </div>
            <div class="form-submit">
                <input type="submit" value="Save">
            </div>
        </div>
    </form>
</body>

</html>
