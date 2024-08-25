<x-layout>
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-blue-600 p-4 text-white">
                <h2 class="text-2xl font-semibold">Post Details</h2>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-700">Title</h3>
                    <p class="text-gray-600">{{ $post->title }}</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-700">Body</h3>
                    <p class="text-gray-600">{{ $post->body }}</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-700">Creator</h3>
                    <p class="text-gray-600">{{ $post->user->name }}</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-700">Created at</h3>
                    <p class="text-gray-600">{{ $post->created_at }}</p>
                </div>
                <div class="mt-6">
                    <a href="{{ route('posts.edit',$post->id) }}"
                        class="inline-block bg-blue-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-blue-700 transition-colors duration-200">Edit</a>
                    <form method="POST" action="{{route('post.delete',$post->id)}}">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="inline-block bg-red-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-red-700 transition-colors duration-200 ml-2">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-layout>