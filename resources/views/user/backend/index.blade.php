<x-layouts.app :title="__('Users')">
    <div class="dropdown align-right">
        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <!-- <i class="feather icon-settings"></i> -->
            <i class="feather icon-plus"></i>
        </button>

        <div class="dropdown-menu aline-right">
            <a class="dropdown-item" id="" href="{{ route('user.backend.users.create') }}">&nbsp; Add new</a>
        </div>
    </div>
    <livewire:user.user-table :userId="$user->id ?? null"/>
</x-layouts.app>
