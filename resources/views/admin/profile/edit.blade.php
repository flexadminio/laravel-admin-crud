<x-admin.app-layout>
    <div name="header">
        <div class="row header justify-content-between mb-4">
            <div class="col-12">
                <h1 class="header-title h3">
                    <i class="fa fa-user text-highlight"></i>
                    {{ __('Profile') }}
                </h1>
            </div>
        </div>
    </div>

    @if (session('message'))
        <h5 class="alert alert-success mb-5">{{ session('message') }}</h5>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mb-5">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card py-12">
                <div class="card-body">
                    @include('admin.profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card py-12">
                <div class="card-body">
                    @include('admin.profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-6">
            <div class="card py-12">
                <div class="card-body">
                    @include('admin.profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div> --}}
</x-admin.app-layout>
