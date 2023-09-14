<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <h3 class="card-title">
            Add Category
        </h3>
    </div>
    {{-- Begin:Form --}}
    <form wire:submit.prevent="store" class="form">
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="la la-exclamation-triangle icon-lg"></i>
                        </span>
                    </div>
                    <input type="text" wire:model="name" name="name" class="form-control" placeholder="Sofa">
                </div>
                <span class="form-text text-muted">This field required</span>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">
                <div wire:loading wire:target="store"><span class="spinner"></span>
                </div>
                Submit
            </button>
            <a href="{{ url('/index-category') }}" type="button" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
