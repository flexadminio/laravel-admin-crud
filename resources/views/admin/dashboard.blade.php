<x-admin.app-layout>
    <h1 class="header-title h3 mb-4">
        <span class="text-highlight">
            FlexAdmin</span> <span class="fw-300">{{ __('Dashboard') }}</span>
    </h1>

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted text-truncate mb-1">Total Product
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="icon-sm bg-primary float-end rounded">
                                <i class="fa-solid fa-shirt"></i>
                            </div>
                        </div>
                    </div>
                    <h2 class="fw-300 my-1">{{App\Models\Product::count()}}</h2>
                    <div class="mt-3">
                        <h6>Target <span class="float-end">59%</span></h6>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="59" aria-valuemin="0"
                                aria-valuemax="100" style="width: 59%">
                                <span class="sr-only">59% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted text-truncate mb-1">Total Users</p>
                        </div>
                        <div class="col-6">
                            <div class="icon-sm bg-success float-end rounded">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <h2 class="fw-300 my-1">{{App\Models\User::count()}}</h2>
                    <div class="mt-3">
                        <h6>Target <span class="float-end">68%</span></h6>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="68" aria-valuemin="0"
                                aria-valuemax="100" style="width: 68%">
                                <span class="sr-only">68% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted text-truncate mb-1">Categories</p>
                        </div>
                        <div class="col-6">
                            <div class="icon-sm bg-info float-end rounded">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                        </div>
                    </div>
                    <h2 class="fw-300 my-1"><span>{{App\Models\Category::count()}}</span></h2>
                    <div class="mt-3">
                        <h6>Target <span class="float-end">74%</span></h6>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="74" aria-valuemin="0"
                                aria-valuemax="100" style="width: 74%">
                                <span class="sr-only">74% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted text-truncate mb-1">Tags</p>
                        </div>
                        <div class="col-6">
                            <div class="icon-sm bg-warning float-end rounded">
                                <i class="fa-solid fa-tags"></i>
                            </div>
                        </div>
                    </div>
                    <h2 class="fw-300 my-1">{{App\Models\Tag::count()}}</h2>
                    <div class="mt-3">
                        <h6>Target <span class="float-end">76%</span></h6>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="76" aria-valuemin="0"
                                aria-valuemax="100" style="width: 76%">
                                <span class="sr-only">76% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin/products/table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
