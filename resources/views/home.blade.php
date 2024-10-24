<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to our E-commerce website!</h1>
        <h1 class="text-2xl font-bold mb-4">Products</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($products as $product)
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                <p class="text-gray-700">{{ $product->description }}</p>
                <p class="text-gray-900 font-bold">${{ $product->price }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>