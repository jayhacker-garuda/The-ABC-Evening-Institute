<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container px-4 mx-auto">
        <div class="flex flex-col space-y-6 pt-28">
            <div class="flex items-center justify-center">
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
                <div class="space-y-4">
                    <div class="flex flex-row space-x-2">
                        <div class="flex flex-col">
                            <x-select wire:model='assign.teacher_id' :errors="$errors->first('assign.teacher_id')">
                                <x-option title="-- Choose --" />
                                @foreach ($teachers as $teacher)
                                    {{-- {{ dd($teachers) }} --}}
                                    <x-option value="{{ $teacher->id }}" title="{{ $teacher->name }}" />
                                @endforeach
                            </x-select>
                        </div>

                        <div class="flex flex-col">
                            <x-select wire:model='assign.course_id' :errors="$errors->first('assign.course_id')">
                                <x-option title="-- Choose --" />
                                @foreach ($courses as $course)
                                    <x-option value="{{ $course->id }}" title="{{ $course->course_name }}" />
                                @endforeach
                            </x-select>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <x-input type="date" wire:model='assign.date' :errors="$errors->first('assign.date')" />
                    </div>
                    <div class="flex flex-row space-x-2">
                        <div class="flex flex-col">
                            <label for="">From</label>
                            <x-input type="time" wire:model='assign.time_from' :errors="$errors->first('assign.time_from')" />
                        </div>
                        <div class="flex flex-col">
                            <label for="">To</label>
                            <x-input type="time" wire:model='assign.time_to' :errors="$errors->first('assign.time_from')" />
                        </div>
                    </div>
                    <div class="flex flex-col">
                        @if ($editMode)
                            <button type="button" wire:click='updateAssign({{ $teacher }})'
                            class="p-2 font-black transition-colors duration-200 bg-pink-400 rounded shadow text-cool-gray-100 focus:bg-pink-600 hover:bg-pink-600">
                            Update Teacher
                        </button>
                        @else
                            <button type="button" wire:click='donAssign'
                            class="p-2 font-black transition-colors duration-200 bg-pink-400 rounded shadow text-cool-gray-100 focus:bg-pink-600 hover:bg-pink-600">
                            Assign Teacher
                        </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Assign Table -->
            <div class="flex items-center justify-center">
                <table class="items-center w-full bg-transparent border-collapse rounded-md shadow-md">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-left text-blue-500 uppercase align-middle border border-l-0 border-r-0 border-blue-100 border-solid bg-blue-50 whitespace-nowrap">
                                Teacher Name
                            </th>

                            <th
                                class="px-6 py-3 text-xs font-semibold text-left text-blue-500 uppercase align-middle border border-l-0 border-r-0 border-blue-100 border-solid bg-blue-50 whitespace-nowrap">
                                Course Name
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-left text-blue-500 uppercase align-middle border border-l-0 border-r-0 border-blue-100 border-solid bg-blue-50 whitespace-nowrap">
                                Date
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-left text-blue-500 uppercase align-middle border border-l-0 border-r-0 border-blue-100 border-solid bg-blue-50 whitespace-nowrap">
                                Time [from]
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-left text-blue-500 uppercase align-middle border border-l-0 border-r-0 border-blue-100 border-solid bg-blue-50 whitespace-nowrap">
                                Time [to]
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-left text-blue-500 uppercase align-middle border border-l-0 border-r-0 border-blue-100 border-solid bg-blue-50 whitespace-nowrap">
                                Created Date
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-left text-blue-500 uppercase align-middle border border-l-0 border-r-0 border-blue-100 border-solid bg-blue-50 whitespace-nowrap">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($assignTeachers as $teacher)
                            <tr class="transition-colors duration-200 bg-blue-200 hover:bg-blue-300 focus:bg-blue-300">
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $teacher->teacher->name }}
                                </th>
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $teacher->course->course_name }}
                                </th>
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $teacher->date }}
                                </th>
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $teacher->time_from }}
                                </th>
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $teacher->time_to }}
                                </th>
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $teacher->created_at }}
                                </th>
                                <td
                                    class="p-4 px-6 space-x-2 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <a href="javascript:void(0)" wire:click='editAssign({{ $teacher->id }})'
                                        class="p-2 font-black text-white uppercase transition-colors duration-150 bg-green-400 rounded-md edit_subject hover:bg-green-600 focus:bg-green-600">Edit</a>
                                    <a href="javascript:void(0)" wire:click='deleteAssign({{ $teacher->id }})'
                                        class="p-2 font-black text-white uppercase transition-colors duration-150 bg-red-400 rounded-md delete_subject hover:bg-red-600 focus:bg-red-600">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <div>
                        {{ $assignTeachers->links() }}
                    </div>
                </table>
            </div>


        </div>
    </div>
</div>
