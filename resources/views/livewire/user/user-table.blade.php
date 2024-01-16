<div class="table-responsive-sm">
    <table class="table">
        <x-ui.table.thead>
            <x-ui.table.tr>
                <x-ui.table.td class="text-left" width="5%">SL</x-ui.table.td>
                <x-ui.table.td class="text-left">Name</x-ui.table.td>
                <x-ui.table.td class="text-left">Email</x-ui.table.td>
                <x-ui.table.td class="text-left">Image</x-ui.table.td>
                <x-ui.table.td class="text-end">Action</x-ui.table.td>
            </x-ui.table.tr>
        </x-ui.table.thead>

        <x-ui.table.tbody class="table_data">
            @foreach ($users as $key => $v)
                <x-ui.table.tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td align="left">{{ $v->name }}</td>
                    <td align="left">{{ $v->email }}</td>
                    <td align="left">
                        <img class="media-object rounded-circle" src="{{ Storage::url($v->image) }}" alt="Avatar"
                            height="50" width="50">
                    </td>
                    <td align="right">
                        <a href="{{ route('user.backend.users.edit', $v->id) }}"
                            class="btn btn-icon rounded-circle btn-outline-success mr-1 mb-1 waves-effect waves-light edit_btn acc_btn">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>

                        <a href="{{ route('user.backend.users.destroy', $v->id)}}"
                            class="btn btn-icon rounded-circle btn-outline-danger  mr-1 mb-1 waves-effect waves-light del_btn delete-data">
                            <i class="fa fa-trash-o"></i>
                        </a>
                        {{-- <!-- <i class="btn btn-icon fa fa-trash-o rounded-circle btn-outline-danger mr-1 mb-1 waves-effect waves-light del_btn delete-data" data-href="{{ route('image.destroy') }}" data-id="{{ $v->id }}"> --> --}}
                    </td>
                </x-ui.table.tr>
            @endforeach
        </x-ui.table.tbody>
    </table>
</div>
