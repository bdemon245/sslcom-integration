<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-[100vh] grid items-center">
    <div class="grid grid-cols-4 justify-center gap-4">
        <div class="col-start-2 col-span-1">
            <img class="rounded aspect-square object-cover" width="90%"
                src="{{ asset('assets/images/eniko-kis-KsLPTsYaqIQ-unsplash.jpg') }}" alt="">
        </div>
        <div class="col-span-1">
            <h2 class="text-2xl font-bold text-slate-700">Lorem ipsum dolor sit</h2>
            <div class="text-xl font-bold text-green-500">৳ 255</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit provident necessitatibus modi optio et
                dicta iure sequi dolorum consequatur magnam voluptate, minus veniam repellat aliquam tenetur incidunt
                asperiores corporis illo officia reiciendis recusandae nulla exercitationem</p>
            <div class="inline-flex flex-col">
                <div class="inline-flex gap-2 items-center mt-4">
                    <div class="text-xl font-bold border rounded inline-block overflow-hidden">
                        <button onclick="count.decrement(event)"
                            class="hover:bg-slate-400 bg-none border-0 px-4 py-2 border-r">-</button>
                        <input id="count" type="text" class="border-none outline-none ring-0 w-8 text-center"
                            value="1">
                        <button onclick="count.increment(event)"
                            class="hover:bg-slate-400 bg-none border-0 px-4 py-2 border-l">+</button>
                    </div>
                    <div class="w-max">
                        <span class="font-bold">x</span>
                        <span class="text-xl font-bold">৳ 255</span>
                        <span class="font-bold"> = </span>
                        <span class="text-xl font-bold text-green-500">৳</span>
                        <span class="text-xl font-bold text-green-500" id="total">255</span>
                    </div>
                </div>
                <form action="#" method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="item_count">
                    <input type="hidden" name="total">
                    <button class="hover:bg-green-600  bg-green-500 rounded p-4 text-lg text-white font-bold w-full">Pay
                        with Nagad</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let price = {
            value: 255,
            total: 255,
            target: document.querySelector('#total'),
            calcTotal: function(count) {
                this.total = count * this.value
                this.target.innerHTML = this.total
                console.log(count);
            }
        }
        let count = {
            value: 1,
            target: document.querySelector('#count'),
            increment: function(e) {
                this.value = ++this.value
                this.target.value = this.value
                price.calcTotal(this.value)
            },
            decrement: function(e) {
                if (this.value > 1) {
                    this.value = --this.value
                    this.target.value = this.value
                    price.calcTotal(this.value)
                }
            },
        }
        let form = {
            itemCount: document.querySelector('input[name="item_count"]'),
            total: document.querySelector('input[name="total"]'),
            onInputHandler: (e) => {
                if (e.target.value !== '') {
                    let count = parseInt(e.target.value)
                    price.calcTotal(count)
                }
            }
        }
        count.target.addEventListener('input', e => form.onInputHandler(e))
    </script>
</body>

</html>