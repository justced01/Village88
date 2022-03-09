
    <div class="container w-full my-4 p-2">
        <h2 class="my-2 text-2xl font-semibold text-center text-gray-900 uppercase">Edit Product - ID 1</h2>
        <form action="product.html" method="" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="" class="block text-gray-700 text-sm font-bold mb-2">Name: </label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="" class="block text-gray-700 text-sm font-bold mb-2">Description: </label>
                <textarea name="" id="" cols="10" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="mb-4">
                <label for="" class="block text-gray-700 text-sm font-bold mb-2">Categories: </label>
                <select name="" id="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <optgroup label="Clothing">
                        <option value=""></option>
                        <option value="">Tops and T-shirt</option>
                        <option value="">Shorts</option>
                        <option value="">Caps</option>
                        <option value="">Hoodies and Sweatshirts</option>
                        <option value="">Socks</option>
                        <option value="">Bags and Backpacks</option>
                    </optgroup>
                </select>
            </div>
            <div class="mb-4">
                <label for="" class="block text-gray-700 text-sm font-bold mb-2">or add new category</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="">
                <label class="block text-gray-700 text-sm font-bold mb-2">Thumbnails of Product: </label>
                <input type="file" name="product_img[]" class="text-sm text-slate-500 file:mr-4 file:py-1 file:px-4w file:rounded-md file:border file:border-slate-300 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer" multiple >
                <ul id="sortable" class="ml-5 my-2 divide-y divide-solid">
                    <li class="flex gap-x-4 items-center">
                        <img src="https://img.icons8.com/material-outlined/24/000000/menu--v1.png"/>
                        <img src="/sample.jpg" alt="" class="w-20">
                        <a href="" class="text-red-500"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAhElEQVRIiWNgGOqAkRhFz31sGhgYGOrRdHZKbj5SQbIFz31s/hPrOmxAcssRFDOZKDGMbPDcx+Y/KT7Bp57mPiDKAnQXkuLDweGDUQtGLRi1gDLAQowi9CIYnY8PDIwPGBkYnv5nYJAmpchmZGB4ik0cuw/+/8/CpQGn4f//ZxGrfmgBAJb0K63m3ULbAAAAAElFTkSuQmCC"></a> 
                        <label for=""><input type="checkbox" name="" id=""> main</label>
                    </li>
                    <li class="flex gap-x-4 items-center">
                        <img src="https://img.icons8.com/material-outlined/24/000000/menu--v1.png"/>
                        <img src="/sample.jpg" alt="" class="w-20"> 
                        <a href=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAhElEQVRIiWNgGOqAkRhFz31sGhgYGOrRdHZKbj5SQbIFz31s/hPrOmxAcssRFDOZKDGMbPDcx+Y/KT7Bp57mPiDKAnQXkuLDweGDUQtGLRi1gDLAQowi9CIYnY8PDIwPGBkYnv5nYJAmpchmZGB4ik0cuw/+/8/CpQGn4f//ZxGrfmgBAJb0K63m3ULbAAAAAElFTkSuQmCC"></a>
                        <label for=""><input type="checkbox" name="" id=""> main</label>
                    </li>
                    <li class="flex gap-x-4 items-center">
                        <img src="https://img.icons8.com/material-outlined/24/000000/menu--v1.png"/>
                        <img src="/sample.jpg" alt="" class="w-20"> 
                        <a href=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAhElEQVRIiWNgGOqAkRhFz31sGhgYGOrRdHZKbj5SQbIFz31s/hPrOmxAcssRFDOZKDGMbPDcx+Y/KT7Bp57mPiDKAnQXkuLDweGDUQtGLRi1gDLAQowi9CIYnY8PDIwPGBkYnv5nYJAmpchmZGB4ik0cuw/+/8/CpQGn4f//ZxGrfmgBAJb0K63m3ULbAAAAAElFTkSuQmCC"></a>
                        <label for=""><input type="checkbox" name="" id=""> main</label>
                    </li>
                    <li class="flex gap-x-4 items-center">
                        <img src="https://img.icons8.com/material-outlined/24/000000/menu--v1.png"/>
                        <img src="/sample.jpg" alt="" class="w-20"> 
                        <a href=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAhElEQVRIiWNgGOqAkRhFz31sGhgYGOrRdHZKbj5SQbIFz31s/hPrOmxAcssRFDOZKDGMbPDcx+Y/KT7Bp57mPiDKAnQXkuLDweGDUQtGLRi1gDLAQowi9CIYnY8PDIwPGBkYnv5nYJAmpchmZGB4ik0cuw/+/8/CpQGn4f//ZxGrfmgBAJb0K63m3ULbAAAAAElFTkSuQmCC"></a>
                        <label for=""><input type="checkbox" name="" id=""> main</label>
                    </li>
                    <li class="flex gap-x-4 items-center">
                        <img src="https://img.icons8.com/material-outlined/24/000000/menu--v1.png"/>
                        <img src="/sample.jpg" alt="" class="w-20"> 
                        <a href=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAhElEQVRIiWNgGOqAkRhFz31sGhgYGOrRdHZKbj5SQbIFz31s/hPrOmxAcssRFDOZKDGMbPDcx+Y/KT7Bp57mPiDKAnQXkuLDweGDUQtGLRi1gDLAQowi9CIYnY8PDIwPGBkYnv5nYJAmpchmZGB4ik0cuw/+/8/CpQGn4f//ZxGrfmgBAJb0K63m3ULbAAAAAElFTkSuQmCC"></a>
                        <label for=""><input type="checkbox" name="" id=""> main</label>
                    </li>
                </ul>
            </div>
            <div class="flex justify-evenly mt-4">
                <a href="product.html" class="mx-1 py-2 px-3 text-gray border rounded border-slate-500 hover:bg-slate-100">Cancel</a>
                <a href="/product/show_product.html" target="_blank" class="mx-1 py-2 px-3 text-gray border rounded border-slate-500 hover:bg-slate-100">Preview</a>
                <input type="submit" value="Submit" class="shadow appearance-none border rounded w-full py-2 px-3 text-white rounded bg-gray-700 hover:bg-gray-900 leading-tight focus:outline-none focus:shadow-outline cursor-pointer">
            </div>
        </form>
    </div>