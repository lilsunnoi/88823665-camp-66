@extends('layouts.default_with_menu')

@section('content')
    <div class="m-5">
        <form action="{{ route('insert') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category Name</label>
                        <input type="text" name="category_name" class="form-control" id="category">
                    </div>
                </div>
            </div>
            <button type="button" id="btn-add-product" class="btn btn-primary">
                + เพิ่ม product
            </button>
            <div class="row" id='add-product'>

            </div>
            <div class="mt-3 row">
                <button class="btn btn-success" type="submit">บันทึก</button>
            </div>
        </form>
        <table class="mt-3 table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Category Name</td>
                    <td>Product Name</td>
                    <td>User Name</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            var count = 1;
            $('#btn-add-product').on('click', function(){
                $("#add-product").append(`
                <div class="mt-3 col-6">
                    <label class="form-label product-label">${count++}. Product Name
                        <button type="button" class="btn btn-danger btn-delete-product">ลบ</button>
                    </label>
                        <input type="text" name="product_name[]" class="form-control" required>
                </div>
                `)
            })

            $(document).on('click','.btn-delete-product', function(){
                $(this).parent().parent().remove();
            })
        });
    </script>
@endsection
