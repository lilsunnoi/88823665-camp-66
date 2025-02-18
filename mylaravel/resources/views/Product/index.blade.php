@extends('layouts.default_with_menu')

@section('content')
    <form action="{{ url('product') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="category" class="form-label">Category Name</label>
                    <input type="text" name="category" class="form-control" id="category" required>
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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="mt-3 table">
        <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Product Name</th>
                <th>User Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                @foreach($category->products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ optional($product->user)->name ?? 'Unknown' }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
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
