<!DOCTYPE html>
<html>
<head>
    <title>Survey Form</title>
</head>
<body>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Age:</label>
            <input type="text" name="age" value="{{ old('age') }}">
            @error('age') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Feedback:</label>
            <textarea name="feedback">{{ old('feedback') }}</textarea>
            @error('feedback') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Rate your experience:</label>
            <select name="rate">
                <option value="excellent" {{ old('rate') == 'excellent' ? 'selected' : '' }}>Excellent</option>
                <option value="good" {{ old('rate') == 'good' ? 'selected' : '' }}>Good</option>
                <option value="average" {{ old('rate') == 'average' ? 'selected' : '' }}>Average</option>
                <option value="poor" {{ old('rate') == 'poor' ? 'selected' : '' }}>Poor</option>
            </select>
            @error('rate') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
