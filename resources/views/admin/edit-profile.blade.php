@extends('admin.layouts.main-admin')
@section('container-admin')
    <main class="h-screen pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto py-4 mb-8 dark:bg-gray-900">

            <div class="lg:w-[80%] md:w-[90%] xs:w-[96%] mx-auto flex gap-4">
                <div
                    class="lg:w-[88%] md:w-[80%] sm:w-[88%] xs:w-full mx-auto shadow-2xl p-4 rounded-xl h-fit self-center dark:bg-gray-800/40">
                    <!--  -->
                    <div class="">
                        <h1
                            class=" ml-4 lg:text-3xl md:text-2xl sm:text-xl xs:text-xl font-serif font-extrabold mb-2 dark:text-white">
                           Edit Profile
                        </h1>
                        <form>
                 <!-- Cover Image -->
<div class="grid sm:grid-cols-2 gap-12 max-w-3xl mx-auto p-4">
    <div for="uploadFile1"
        class="bg-gray-50 dark:bg-gray-800 text-center px-4 rounded w-full h-80 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-400 border-dashed font-[sans-serif] dark:border-gray-600">
        <div class="py-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 mb-2 fill-gray-600 dark:fill-gray-300 inline-block"
                viewBox="0 0 32 32">
                <path
                    d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                     />
                <path
                    d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                     />
            </svg>
            <h4 class="text-base font-semibold text-gray-600 dark:text-gray-300">Drag and drop files here</h4>
        </div>

        <hr class="w-full border-gray-400 dark:border-gray-600 my-2" />

        <div class="py-6">
            <input type="file" id='uploadFile1' class="hidden" />
            <label for="uploadFile1"
                class="block px-6 py-2.5 rounded text-gray-600 dark:text-gray-300 text-sm tracking-wider cursor-pointer font-semibold border-none outline-none bg-gray-200 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">Browse
                Files</label>
            <p class="text-xs text-gray-400 dark:text-gray-500 mt-4">PNG, JPG SVG, WEBP, and GIF are Allowed.</p>
        </div>
    </div>
</div>


                            <div
                                class="w-full h-48 bg-gray-800 border-4 mt-4 border-black flex items-center justify-center">
                                <!-- Profile Image -->

                                <div
                                    class="relative mx-auto flex justify-center w-[141px] h-[141px] bg-teal-500 rounded-full bg-[url('https://images.unsplash.com/photo-1438761681033-6461ffad8d80?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw4fHxwcm9maWxlfGVufDB8MHx8fDE3MTEwMDM0MjN8MA&ixlib=rb-4.0.3&q=80&w=1080')] bg-cover bg-center bg-no-repeat">
                                    <div class="bg-white/90 rounded-full w-6 h-6 text-center absolute bottom-4 right-4">
                                        <input type="file" name="profile" id="upload_profile" hidden required>
                                        <label for="upload_profile">

                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-4 justify-between w-full">
                                <div class="w-full mb-4 px-2">
                                    <label for="first_name" class="block mb-2 dark:text-gray-300">First Name</label>
                                    <input type="text" id="first_name"
                                        class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                        placeholder="First Name">
                                </div>
                                <div class="w-full mb-4 px-2">
                                    <label for="last_name" class="block mb-2 dark:text-gray-300">Last Name</label>
                                    <input type="text" id="last_name"
                                        class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                        placeholder="Last Name">
                                </div>
                            </div>

                            <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-4 justify-center w-full">
                                <div class="w-full lg:w-1/2 md:w-full mb-4 px-2">
                                    <h3 class="dark:text-gray-300 mb-2">Sex</h3>
                                    <select
                                        class="w-full text-grey border-2 rounded-lg p-4 pl-2 pr-2 dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800">
                                        <option disabled value="">Select Sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="w-full lg:w-1/2 md:w-full mb-4 px-2">
                                    <h3 class="dark:text-gray-300 mb-2">Date Of Birth</h3>
                                    <input type="date"
                                        class="text-grey p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800">
                                </div>
                            </div>

                            <div class=" mt-4 text-white text-lg font-semibold">
                                <button type="submit" class="w-full p-2 bg-purple-600 hover:bg-purple-700 rounded-lg">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
