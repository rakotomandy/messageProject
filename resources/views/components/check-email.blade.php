 <div class="bg-gray-100 flex items-center justify-center min-h-screen">
     <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
         <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">ENTER YOUR EMAIL</h2>

         <form id="checkEmail" class="space-y-5">
            @csrf
             <!-- Email -->
             <div>
                 <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                 <input type="email" id="email" name="email" placeholder="you@example.com" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
             </div>

             <!-- Submit Button -->
             <div class="flex items-center justify-between gap-2">
                 <button type="submit" class=" w-1/2 bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">
                     VERIFY EMAIL
                 </button>
                 <a href="{{ route('login') }}" class="w-1/2 bg-red-600 text-white font-semibold py-2 rounded-lg text-center hover:bg-red-700 transition">BACK TO LOGIN</a>
             </div>

         </form>
     </div>
 </div>
