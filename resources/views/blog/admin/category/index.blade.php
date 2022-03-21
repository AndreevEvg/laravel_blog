<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <nav class="navbar navbar-toggle-md navbar-light bg-faded">
                        <a class="btn btn-primary" href="{{ route('blog.admin.category.create') }}">Добавить</a>
                    </nav>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Категория</th>
                                        <th>Родитель</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($paginator as $item)
                                    @php /** @var \App\Models\BlogCategory $item */ @endphp
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <a href="{{ route('blog.admin.category.edit', $item->id) }}">
                                                {{ $item->title }}
                                            </a>
                                        </td>
                                        <td @if(in_array($item->parent_id, [0, 1])) style="color:#ccc" @endif>
                                            {{ $item->parent_id }} {{-- $item->parentCategory->title --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @if($paginator->total() > $paginator->count())
                <br>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </x-auth-card>
</x-guest-layout>
