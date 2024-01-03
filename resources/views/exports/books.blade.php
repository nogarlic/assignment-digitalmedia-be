<!DOCTYPE html>
<html>
<head>
    <title>Books Export</title>
    <style>
        /* Atur tata letak, gaya, dan format data di sini */
        /* Contoh: */
        .book-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .book-image {
            max-width: 100px;
            max-height: 100px;
            margin-right: 20px;
        }
        .book-details {
            flex: 1;
        }
        .book-details div {
            margin-bottom: 10px;
        }
        .book-details .title {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Books Export</h2>
    @foreach($excelData as $data)
        <div class="book-container">
            <img src="{{ asset($data['cover_image']) }}" alt="Cover Image" class="book-image">
            <div class="book-details">
                <div class="title">{{ $data['title'] }}</div>
                <div><strong>Category:</strong> {{ $data['category_name'] }}</div>
                <div><strong>Description:</strong> {{ $data['description'] }}</div>
                <div><strong>Quantity:</strong> {{ $data['quantity'] }}</div>
                <div><strong>User:</strong> {{ $data['user_name'] }}</div>
                <div><strong>File path:</strong> {{ $data['file_path'] }}</div>
                <div><strong>Cover image:</strong> {{ $data['cover_image'] }}</div>
            </div>
        </div>
    @endforeach
</body>
</html>
