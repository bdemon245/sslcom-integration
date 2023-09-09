<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Orders</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .active {
            background: #4ade80;
            color: black;
            border-color: #22c55e;
        }
    </style>
</head>

<body class="h-[100vh] grid items-center">
    <div class="grid grid-cols-12 justify-center gap-4 mb-4">
        <div class="col-span-12 flex gap-8 justify-center">
            <a href="/"
                class="border rounded px-4 py-2 {{ url()->current() === url('/') ? 'active' : '' }}">Product</a>
            <a href="/orders"
                class="border rounded px-4 py-2 {{ url()->current() === url('/orders') ? 'active' : '' }}">Orders</a>
        </div>
        <div class="col-start-2 col-span-10 mx-4">
            <table class="table-auto border-collapse border border-slate-400 w-full">
                <thead class="bg-slate-300">
                    <tr>
                        <th class="border border-slate-300 p-2">No.</th>
                        <th class="border border-slate-300 p-2">Trx ID</th>
                        <th class="border border-slate-300 p-2">Customer</th>
                        <th class="border border-slate-300 p-2">Product Name</th>
                        <th class="border border-slate-300 p-2">Price</th>
                        <th class="border border-slate-300 p-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $key => $order)
                        <tr>
                            <td class="border border-slate-300 p-2">{{ $key + 1 }}</td>
                            <td class="border border-slate-300 p-2">{{ $order->transaction_id }}</td>
                            <td class="border border-slate-300 p-2">{{ $order->name }}</td>
                            <td class="border border-slate-300 p-2">{{ $order->product }}</td>
                            <td class="border border-slate-300 p-2">{{ $order->amount . ' ' . $order->currency }}</td>
                            <td class="border border-slate-300 p-2">{{ $order->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No orders found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>
