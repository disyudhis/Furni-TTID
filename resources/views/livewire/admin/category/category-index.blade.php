<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">All Category
            </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{ url('manage-category') }}" class="btn btn-primary font-weight-bolder">
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
                </span>Add Category</a>
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
                                <input type="text" wire:model="search" class="form-control" placeholder="Search..."
                                    id="kt_datatable_search_query">
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
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
                                style="width: 108px;">Name</span></th>
                        <th data-field="Country" class="datatable-cell datatable-cell-sort"><span
                                style="width: 108px;">Updated At</span></th>
                        <th data-field="Actions" data-autohide-disabled="false"
                            class="datatable-cell datatable-cell-sort"><span style="width: 125px;">Actions</span></th>
                    </tr>
                </thead>
                <tbody class="datatable-body" style="">
                    @forelse ($categories as $category)
                        <tr data-row="0" class="datatable-row" style="left: 0px;">
                            <td data-field="name" class="datatable-cell"><span
                                    style="width: 108px;">{{ $category->name }}</span></td>
                            <td data-field="updated_at" data-autohide-disabled="false" aria-label="3"
                                class="datatable-cell">
                                <span style="width: 108px;"><span
                                        class="label label-success label-dot mr-2"></span><span
                                        class="font-weight-bold text-success">{{ $category->updated_at }}</span></span>
                            </td>
                            <td data-field="Actions" data-autohide-disabled="false" aria-label="null"
                                class="datatable-cell"><span
                                    style="overflow: visible; position: relative; width: 125px;">
                                    <button wire:click="delete({{ $category->id }})"
                                        class="btn btn-sm btn-clean btn-icon" title="Delete"> <span
                                            class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24">
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
                            <td class="datatable-cell">No Product</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="datatable-pager datatable-paging-loaded">
                {{ $categories->links() }}

            </div>

        </div>
        <!--end: Datatable-->
    </div>
</div>
