<x-layout>
    <div class="container mx-auto">
        <div class="my-4">
            <a href="{{route('posts.create')}}"
                class="w-full py-2 px-3 rounded-md bg-blue-600 hover:bg-blue-500 duration-150 transition-all text-white">Create
                User</a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr class="w-full bg-blue-600 text-white">
                    <th class="py-3 px-4 text-left">#</th>
                    <th class="py-3 px-4 text-left">Title</th>
                    <th class="py-3 px-4 text-left w-[400px]">Body</th>
                    <th class="py-3 px-4 text-left">Creator</th>
                    <th class="py-3 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr class="border-b">
                    <td class="py-3 px-4">{{$post->id}}</td>
                    <td class="py-3 px-4">{{ $post->title }}</td>
                    <td class="py-3 px-4">{{ $post->body }}</td>
                    <td class="py-3 px-4">{{ $post->user->name }}</td>
                    <td class="py-3 px-4 flex items-center gap-2">
                        <a href="{{route('post.show',$post->id)}}"
                            class="py-2 px-3 rounded-md bg-blue-500 hover:bg-blue-600 duration-150 transition-all text-white">
                            Show
                        </a>
                        <a href="{{route('posts.edit',$post->id)}}"
                            class="py-2 px-3 rounded-md bg-green-500 hover:bg-green-600 duration-150 transition-all text-white">Edit</a>
                        <form method="POST" action="{{route('post.delete',$post->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="py-2 px-3 rounded-md bg-red-500 hover:bg-red-600 duration-150 transition-all text-white">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-full my-4">
            {{$posts->links()}}
        </div>
    </div>
</x-layout>