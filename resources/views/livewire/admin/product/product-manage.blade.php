<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <h3 class="card-title">
            Add Product
        </h3>
    </div>
    {{-- Begin:Form --}}
    <form wire:submit.prevent="store" class="form" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label>Title</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="la la-exclamation-triangle icon-lg"></i>
                        </span>
                    </div>
                    <input type="text" wire:model="title" name="title" class="form-control" placeholder="Sofa Keren">
                </div>
                <span class="form-text text-muted">This field required</span>
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            Rp.
                        </span>
                    </div>
                    <input type="number" wire:model="price" name="price" class="form-control" placeholder="100000">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            .00
                        </span>
                    </div>
                </div>
                <span class="form-text text-muted">This field required</span>
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Discount Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            Rp.
                        </span>
                    </div>
                    <input type="number" wire:model="discount_price" name="discount_price" class="form-control"
                        placeholder="80000">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            .00
                        </span>
                    </div>
                </div>
                <span class="form-text text-muted">This field required</span>
                @error('discount_price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="custom-select form-control">
                    <option selected value="">Open this option</option>
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option value="">No Product</option>
                    @endforelse
                </select>
                <span class="form-text text-muted">This field required</span>
                @error('category')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Image</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose Image</label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('/index-product') }}" type="button" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
