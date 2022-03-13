
    <div class="container w-2/3 mx-auto mt-14">
        <div class="flex justify-between items-center">
            <a href="<?= base_url(); ?>orders" class="p-2 border rounded border-slate-900 transition ease-in-out hover:border-white hover:bg-slate-700 hover:text-white">Go back</a>
            <p class="p-2 text-green-900 border rounded border-green-500 bg-green-200">Status: Shipped</p>
        </div>
        <div class="mt-5 flex gap-x-4">
            <aside class="basis-2/4 pb-2 border-b border-gray-500">
                <h3 class="mb-2 pb-2 text-xl font-semibold border-b border-gray-500">Order ID: 1</h3>
                <div class="mb-4">
                    <h2 class="pb-1 text-md text-gray-700 font-bold border-b border-gray-200">Customer shipping info:</h2>
                    <p class="flex items-center"><span class="w-1/4 font-semibold">Name:</span> Bob</p>
                    <p class="flex items-center"><span class="w-1/4 font-semibold">Address:</span> 31 3rd Street Santo Niño</p>
                    <p class="flex items-center"><span class="w-1/4 font-semibold">City:</span> Seattle</p>
                    <p class="flex items-center"><span class="w-1/4 font-semibold">State:</span> WA</p>
                    <p class="flex items-center"><span class="w-1/4 font-semibold">Zipcode:</span> 98133</p>
                </div>
                <div>
                    <h2 class="pb-1 text-md text-gray-700 font-bold border-b border-gray-200">Customer billing info:</h2>
                    <p class="flex items-center"><span class="w-1/4 font-semibold">Name:</span> Bob</p>
                    <p class="flex items-center"><span class="w-1/4 font-semibold">Address:</span> 31 3rd Street Santo Niño</p>
                    <p class="flex items-center"><span class="w-1/4 font-semibold">City:</span> Seattle</p>
                    <p class="flex items-center"><span class="w-1/4 font-semibold">State:</span> WA</p>
                    <p class="flex items-center"><span class="w-1/4 font-semibold">Zipcode:</span> 98133</p>
                </div>
            </aside>
            <table class="table-auto w-full border-collapse border rounded border-slate-200 shadow">
                <tr class="rounded-lg text-md text-gray-700 text-left">
                    <th class="px-4 bg-[#f8f8f8]">ID</th>
                    <th class="px-4 bg-[#f8f8f8]">Item</th>
                    <th class="px-4 bg-[#f8f8f8]">Price</th>
                    <th class="px-4 bg-[#f8f8f8]">Quantity</th>
                    <th class="px-4 bg-[#f8f8f8]">Total</th>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-gray-200">
                    <td class="px-4">1</td>
                    <td class="px-4">White tshirt with white login</td>
                    <td class="px-4">$19.99</td>
                    <td class="px-4">12</td>
                    <td class="px-4">$14.55</td>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-gray-200">
                    <td class="px-4">1</td>
                    <td class="px-4">White tshirt with white login</td>
                    <td class="px-4">$19.99</td>
                    <td class="px-4">12</td>
                    <td class="px-4">$14.55</td>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-gray-200">
                    <td class="px-4">1</td>
                    <td class="px-4">White tshirt with white login</td>
                    <td class="px-4">$19.99</td>
                    <td class="px-4">12</td>
                    <td class="px-4">$14.55</td>
                </tr>
                <tr class="hover:bg-gray-100 border-b border-gray-200">
                    <td class="px-4">1</td>
                    <td class="px-4">White tshirt with white login</td>
                    <td class="px-4">$19.99</td>
                    <td class="px-4">12</td>
                    <td class="px-4">$14.55</td>
                </tr>
            </table>
        </div>
        <div class="mt-4 pb-3 w-full text-right border-b border-slate-300">
            <p class="font-semibold text-gray-700">Sub Total: $19.99</p>
            <p class="font-semibold text-gray-700">Shipping: $14.99</p>
            <p class="font-bold text-gray-700">Total Price: $30.98</p>
        </div>
    </div>
</body>
</html>