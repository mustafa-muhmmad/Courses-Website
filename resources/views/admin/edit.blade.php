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
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <form action="{{route('adminUpdateCourses.update',$course->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="courseName">Name</label>
        <input type="text" name="name" id="courseName" value="{{$course->name}}">

        <label for="courseLink">Link</label>
        <input type="text" name="link" id="courseLink" value="{{$course->link}}">

        <label for="courseDescription">Description</label>
        <input type="text" name="description" id="courseDescription" value="{{$course->description}}">

        <select class="form-select" aria-label="Default select example" name='instructor_id'>
        <option disabled>Select Instructor</option>
        @foreach ($instructors as $instructor)
            <option value="{{ $instructor->id }}" {{ $instructor->id == $course->instructor_id ? 'selected' : '' }}>
                {{ $instructor->name }}
            </option>
        @endforeach
        </select>

        <div class="form-submit">
            <input type="submit" value="Save">
        </div>
    </form>
</body>
</html>
