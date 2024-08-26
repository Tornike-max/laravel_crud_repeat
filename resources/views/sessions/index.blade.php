<x-layout>
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-blue-600 p-4 text-white">
                <h2 class="text-2xl font-semibold">Login User</h2>
            </div>
            <div class="p-6">
                <form action="{{route('sessions.login')}}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="text" id="email" name="email" value="{{old('email')}}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="bg-blue-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-blue-700 transition-colors duration-200">Login</button>
                        <a href="{{route('users.registerForm')}}"
                            class="inline-block bg-gray-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-gray-700 transition-colors duration-200 ml-2">You
                            don't have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>