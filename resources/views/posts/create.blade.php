<x-layout>
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-blue-600 p-4 text-white">
                <h2 class="text-2xl font-semibold">Create Post</h2>
            </div>
            <div class="p-6">
                <form action="{{route('posts.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                        <input type="text" id="title" name="title" value="{{old('title')}}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Body</label>
                        <textarea id="body" name="body"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">{{old('body')}}</textarea>
                    </div>

                    <!-- Role Field -->
                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">User</label>
                        <select id="role" name="user_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($users as $user)
                            <option value={{$user->id}}>{{$user->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit"
                            class="bg-blue-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-blue-700 transition-colors duration-200">Create
                            Post</button>
                        <a href="{{route('posts.index')}}"
                            class="inline-block bg-gray-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-gray-700 transition-colors duration-200 ml-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>