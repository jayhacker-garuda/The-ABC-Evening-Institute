<div>
    {{-- Do your work, then step back. --}}
    <div class="container px-4 mx-auto">
        <div class="flex flex-col space-y-6 pt-28 md:pt-28">
            <div class="w-full p-4 mx-auto bg-white rounded shadow-2xl md:w-4/12">
                <div class="flex justify-between p-4 mb-2">
                    <h3>Add Your Course</h3>
                    <div>
                        <span>LOGO</span>
                    </div>
                </div>
                @if (session()->has('success'))
                    <div class="flex items-center h-12 p-4 my-3 text-sm text-left text-white bg-green-500 rounded-md"
                        role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="w-6 h-6 mx-2 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="flex items-center h-12 p-4 my-3 text-sm text-left text-white bg-red-500 rounded-md"
                        role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="w-6 h-6 mx-2 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                        {{ session('error') }}
                    </div>
                @endif
                <div class="flex justify-center">
                    {{-- <form> --}}
                    <div class="space-y-4">
                        <div class="flex flex-col">

                            <input disabled class="form-input" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="flex flex-col">
                            <x-select wire:model='courseUser.course_id'
                                :errors="$errors->first('courseUser.course_id')">
                                <x-option title="-- Choose --"></x-option>
                                @foreach ($courses as $course)
                                    <x-option value="{{ $course->id }}" title="{{ $course->course_name }}">
                                    </x-option>
                                @endforeach
                            </x-select>
                        </div>

                        <div class="flex flex-col">
                            <button type="button" wire:click="donAddCourse"
                                class="p-2 font-black transition-colors duration-200 bg-pink-400 rounded shadow text-cool-gray-100 focus:bg-pink-600 hover:bg-pink-600">Add
                                Your Course</button>
                        </div>
                        {{-- <div class="flex justify-end">
                            <p class="text-sm">Don`t have an account ? <a href="{{ route('register') }}" class="text-pink-600">register here</a></p>
                        </div> --}}
                        <p class="text-center">Train your mind to see the good in every situation</p>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>

            <section class="bg-gray-900 rounded-md">
                <div class="max-w-screen-xl px-4 py-16 mx-auto space-y-8 sm:px-6 lg:px-8">
                    <div class="max-w-lg mx-auto text-center">
                        <h2 class="text-3xl font-bold text-white sm:text-4xl">Your Choice</h2>

                        <p class="mt-4 text-gray-300">
                            Here you can find all the courses you have applied for, the teacher
                            assigned to the course and also the time schedule for each course.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                        {{-- {{ dd($userData) }} --}}
                        @forelse ($userData as $info)
                            {{-- {{ dd($info->teacher) }} --}}
                            <div class="block p-8 border border-gray-800 shadow-xl rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                                <h3 class="mt-3 text-xl font-bold text-white">{{ $info->student->name }}</h3>

                                <p class="mt-4 text-sm text-gray-300">
                                    Course Name: {{ $info->course->course_name }}

                                </p>
                                <p class="mt-4 text-sm text-gray-300">
                                    Date: {{ $info->teacher[0]->date }}
                                    <strong class="px-2 bg-blue-400 rounded-md text-cool-gray-600">
                                        From: {{ $info->teacher[0]->time_from }}
                                        To: {{ $info->teacher[0]->time_to }}
                                    </strong>
                                </p>
                                <p class="mt-4 text-sm text-cool-gray-500">
                                    @if (!empty($showMode))
                                    @if ($showMode->id === $info->teacher[0]->teacher_id)

                                        <button wire:click="closeHidden"
                                        class="p-2 font-black border border-gray-800 shadow-xl text-cool-gray-500 rounded-xl hover:bg-yellow-200">
                                        Hide
                                    </button>
                                    @endif
                                    @else
                                        <button wire:click="updateTeacher({{ $info->teacher[0]->teacher_id }})"
                                        class="p-2 font-black border border-gray-800 shadow-xl text-cool-gray-500 rounded-xl hover:bg-yellow-200">
                                        View Assign Teacher
                                    </button>
                                    @endif

                                </p>

                                @if ($showMode)
                                    @if ($showMode->id === $info->teacher[0]->teacher_id)

                                        <div  x-data="{ showMode : false }" x-on:data-fetch.window="showMode = true"
                                            x-on:data-close.window="showMode = false">
                                            <div class="flex justify-start pt-2">
                                                <p class="p-2 font-black border border-pink-400 shadow-xl text-cool-gray-500 rounded-xl hover:bg-pink-200">
                                                {{ $teacherName }}
                                            </p>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @empty
                            <div class="text-center">
                                <span role="img" class="text-5xl">
                                    😢
                                </span>

                                <p class="mt-6 text-gray-500">
                                    We found 0 results, please try adding data.
                                </p>
                            </div>


                        @endforelse
                    </div>

                    <div class="text-center">
                        <a class="inline-block px-5 py-3 text-sm font-medium text-white bg-blue-500 rounded-lg" href="">
                            Find out more
                        </a>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
