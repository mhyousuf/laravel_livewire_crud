@php
    $wireTargets = ['email', 'name', 'password', 'image', 'submit'];
@endphp

<div wire:loading.class="disabled" wire:target="{{ implode(',', $wireTargets) }}">
    <div class="card-content">
        <div class="card-body">
            <form wire:submit="submit">
                <x-ui.form.body>
                    <x-ui.row class="row form_box">
                        <x-ui.col class="col-md-6">
                            {{-- <div class="form-group"> --}}
                            <x-ui.form.input :label="__('Email')" type="email" wire:model="email" id="email"
                                placeholder="Email" required />

                            {{-- @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror --}}
                            {{-- @if ($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif --}}
                            {{-- </div> --}}
                        </x-ui.col>

                        <x-ui.col class="col-md-6">
                            <div class="form-group">
                                <x-ui.form.input :label="__('Password')" type="password" wire:model="password" id="password"
                                    placeholder="Password" />
                                {{-- @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror --}}
                            </div>
                        </x-ui.col>
                    </x-ui.row>

                    <x-ui.row class="row form_box">
                        <x-ui.col class="col-md-6">
                            <div class="form-group">
                                <x-ui.form.input :label="__('Name')" type="text"
                                    class="form-control @error('name') is-invalid @enderror" wire:model="name"
                                    id="name" {{-- value="{{ old('name') ?? $user->name ?? null }}" --}} placeholder="Name" />
                                {{-- @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror --}}
                            </div>
                        </x-ui.col>

                        <x-ui.col class="col-md-6">
                            <div class="form-group">

                                @isset($users->image)
                                    <a href="{{ Storage::url($users->image) }}" class="float-sm-end" target="_blank">Show
                                        Media</a>
                                @endisset
                                <x-ui.form.input :label="__('Image')" type="file" wire:model="image" id="image" />
                            </div>
                        </x-ui.col>
                    </x-ui.row>

                    <x-ui.row class="row form_box">
                        <x-ui.col class="col-md-6">
                            <div class="form-group">

                                @if ($users && $users->getMedia('nid_front'))
                                    <a href="{{ $users->getFirstMediaUrl('nid_front') }}" class="float-sm-end"
                                        target="_blank">Show Media</a>
                                @endif

                                <x-ui.form.input :label="__('Nid Front')" type="file" wire:model="nid_front"
                                    class="form-control" id="nid_front" />
                            </div>
                        </x-ui.col>

                        <x-ui.col class="col-md-6">
                            <div class="form-group">

                                @if ($users && $users->getMedia('nid_back'))
                                    <a href="{{ $users->getFirstMediaUrl('nid_back') }}" class="float-sm-end"
                                        target="_blank">Show Media</a>
                                @endif

                                <x-ui.form.input :label="__('Nid Back')" type="file" wire:model="nid_back"
                                    class="form-control" id="nid_back" />
                            </div>
                        </x-ui.col>
                    </x-ui.row>

                    <x-ui.row class="row form_box">
                        <x-ui.col class="col-md-12">
                            <div class="form-group">

                                @if ($users && $users->getMedia('passport'))
                                    <a href="{{ $users->getFirstMediaUrl('passport') }}" class="float-sm-end"
                                        target="_blank">Show Media</a>
                                @endif

                                <x-ui.form.input :label="__('Passport')" type="file" wire:model="passport"
                                    class="form-control" id="passport" />
                            </div>
                        </x-ui.col>
                    </x-ui.row>
                </x-ui.form.body>

                {{-- @isset($users->image)
                    <div class="text-center my-3">
                        <img src="{{ Storage::url($users->image) }}" class="rounded" alt="User" width="400" height="350">
                    </div>
                @endisset --}}
                <x-ui.form.footer>
                    <x-ui.row>
                        <x-ui.col class="col-md-12 my-3">
                            <button class="btn btn-success" type="submit">
                                {{ isset($users) ? 'Update' : 'Save' }}
                            </button>

                            <a href="{{ route('user.backend.users.index') }}" type="button" class="btn btn-danger">Cencel</a>
                        </x-ui.col>
                    </x-ui.row>
                </x-ui.form.footer>
            </form>
        </div>
    </div>
</div>
