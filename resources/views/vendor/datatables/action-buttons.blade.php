<div class="text-center">
    <a class="btn btn-sm btn-info" href="{{ /*route('products.show', ['product' => $product->slug])*/ $show }}">
        <i class="fas fa-eye"></i>
    </a>
    <a class="btn btn-sm btn-primary" href="{{ /*route('products.edit', ['product' => $product->slug])*/ $edit }}">
        <i class="fas fa-pen"></i>
    </a>
    <button class="btn btn-sm btn-danger" onclick="DataTableUtils.deleteRecord(this, '{{$recordName}}')" data-action="{{ $destroy }}">
        <i class="fas fa-trash"></i>
    </button>
</div>
