<x-layouts.app :title="__('Users')">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Storage Image Media') }}</h4>
                    </div>
                <livewire:user.user-form :userId="$user->id ?? null"/>
                </div>
            </div>
        </div>
</section>
</x-layouts.app>
