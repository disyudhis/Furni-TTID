<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">All Products
            </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{ route('manage-product') }}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                            <path
                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                fill="#000000" opacity="0.3"></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Add Product</a>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Search Form-->
        <!--begin::Search Form-->
        <div class="mb-7">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="row align-items-center">
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search..."
                                    id="kt_datatable_search_query">
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                <div class="dropdown bootstrap-select form-control"><select class="form-control">
                                        <option value="" selected>All</option>
                                        <option value="1">Online</option>
                                        <option value="2">Retail</option>
                                        <option value="3">Direct</option>
                                    </select><button type="button" tabindex="-1"
                                        class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown"
                                        role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox"
                                        aria-expanded="false" data-id="kt_datatable_search_type" title="All">
                                        <div class="filter-option">
                                            <div class="filter-option-inner">
                                                <div class="filter-option-inner-inner">All</div>
                                            </div>
                                        </div>
                                    </button>
                                    <div class="dropdown-menu ">
                                        <div class="inner show" role="listbox" id="bs-select-2" tabindex="-1">
                                            <ul class="dropdown-menu inner show" role="presentation"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Search Form-->
        <!--end: Search Form-->
        <!--begin: Datatable-->
        <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
            id="kt_datatable" style="position: static; zoom: 1;">
            <table class="datatable-table" style="display: block;">
                <thead class="datatable-head">
                    <tr class="datatable-row" style="left: 0px;">
                        <th data-field="OrderID" class="datatable-cell datatable-cell-sort"><span
                                style="width: 108px;">Title</span></th>
                        <th data-field="Country" class="datatable-cell datatable-cell-sort"><span
                                style="width: 108px;">Price</span></th>
                        <th data-field="ShipDate" class="datatable-cell datatable-cell-sort"><span
                                style="width: 108px;">Discount Price</span></th>
                        <th data-field="CompanyName" class="datatable-cell datatable-cell-sort">
                            <span style="width: 108px;">Image</span>
                        </th>
                        <th data-field="Status" class="datatable-cell datatable-cell-sort">
                            <span style="width: 108px;">Category</span>
                        </th>
                        <th data-field="Actions" data-autohide-disabled="false"
                            class="datatable-cell datatable-cell-sort"><span style="width: 125px;">Actions</span></th>
                    </tr>
                </thead>
                <tbody class="datatable-body" style="">
                    @forelse ($products as $product)
                        <tr data-row="0" class="datatable-row" style="left: 0px;">
                            <td data-field="OrderID" aria-label="68382-161" class="datatable-cell"><span
                                    style="width: 108px;">{{ $product->title }}</span></td>
                            <td data-field="Country" aria-label="Japan" class="datatable-cell"><span
                                    style="width: 108px;">Rp. {{ number_format($product->price, 2) }}</span></td>
                            <td data-field="ShipDate" aria-label="4/26/2017" class="datatable-cell"><span
                                    style="width: 108px;">Rp. {{ number_format($product->discount_price, 2) }}</span>
                            </td>
                            <td data-field="CompanyName" aria-label="Maggio-Friesen" class="datatable-cell"><img
                                    src="../storage/{{ $product->image }}" width="100" style="object-fit: cover;"
                                    alt="">
                            </td>
                            <td data-field="Status" aria-label="5" class="datatable-cell">
                                <span style="width: 108px;"><span
                                        class="label font-weight-bold label-lg  label-light-info label-inline">{{ $product->category->name }}</span></span>
                            </td>
                            <td data-field="Actions" data-autohide-disabled="false" aria-label="null"
                                class="datatable-cell"><span
                                    style="overflow: visible; position: relative; width: 125px;">
                                    <button wire:click="edit('{{ $product->id }}')" type="button"
                                        class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details"> <span
                                            class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24"
                                                        height="24">
                                                    </rect>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                    </path>
                                                    <rect fill="#000000" opacity="0.3" x="5"
                                                        y="20" width="15" height="2" rx="1">
                                                    </rect>
                                                </g>
                                            </svg> </span> </button> <button wire:click="delete('{{ $product->id }}')"
                                        type="button" class="btn btn-sm btn-clean btn-icon" title="Delete"> <span
                                            class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24"
                                                        height="24">
                                                    </rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg> </span> </button>
                                </span></td>
                        </tr>
                    @empty
                        <tr data-row="0" class="datatable-row" style="left: 0px;">
                            <td colspan="8" class="datatable-cell text-center">No Product</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
        <!--end: Datatable-->
    </div>
</div>
