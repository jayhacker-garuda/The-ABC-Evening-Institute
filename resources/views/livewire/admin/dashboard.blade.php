<div>
    {{-- Be like water. --}}
    <div class="container px-4 mx-auto">
        <div class="flex flex-col space-y-6 pt-28">
            <div>

            <div class="flex items-center justify-center">
                <div class="w-6/12 h-auto p-4 bg-pink-200 rounded-md">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="flex-col">

                            <x-modal alpname="course" modalTitle="Courses Form" btnName="Add Course">
                                @livewire('admin.forms.add-course')
                            </x-modal>
                        </div>
                        <div class="flex-col">
                            <x-modal alpname="teacher" modalTitle="Teachers Form" btnName="Add Teacher">
                                @livewire('admin.forms.add-teacher')

                            </x-modal>
                        </div>
                        <div class="flex-col">
                            <x-modal alpname="student" modalTitle="Students Form" btnName="Add Student">

                                @livewire('admin.forms.add-student')
                            </x-modal>
                        </div>
                        <div class="flex-col">
                            <a href="{{ route('admin.assign.teacher') }}">
                                <button type="button" class="px-6 font-black bg-blue-500 rounded shadow-md text-md">
                                    Assign Teacher`s Course
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <!-- Courses Table -->
            <div class="flex items-center justify-center">
                <table class="items-center w-full bg-transparent border-collapse rounded-md shadow-md ">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-left text-blue-500 uppercase align-middle border border-l-0 border-r-0 border-blue-100 border-solid bg-blue-50 whitespace-nowrap">
                                Course Name
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
                        @foreach ($courses as $course)
                            <tr class="transition-colors duration-200 bg-blue-200 hover:bg-blue-300 focus:bg-blue-300">
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $course->course_name }}
                                </th>
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $course->created_at }}
                                </th>
                                <td
                                    class="p-4 px-6 space-x-2 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    {{-- <div class="flex flex-row"> --}}

                                    <a href="javascript:void(0)" wire:click='editCourse({{ $course->id }})'
                                        class="p-2 font-black text-white uppercase transition-colors duration-150 bg-green-400 rounded-md hover:bg-green-600 focus:bg-green-600">Edit</a>
                                    <a href="javascript:void(0)" wire:click='deleteCourse({{ $course->id }})'
                                        class="p-2 font-black text-white uppercase transition-colors duration-150 bg-red-400 rounded-md hover:bg-red-600 focus:bg-red-600">Delete</a>
                                    {{-- </div> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <!-- End Courses Table -->
            <!-- Edit Courses -->
            @if ($editCourseMode)
                <div x-data="{ editCourse: false }" x-on:edit-course-open.window="editCourse = true"
                    x-on:edit-course-close.window="editCourse = false">
                    <div class="flex items-center justify-center">
                        <div class="w-40 h-auto p-4 bg-white rounded-md">
                            <div class="flex flex-row items-center justify-center space-x-4">
                                <form wire:submit.prevent='updateCourse({{ $course }})' class="space-y-4 md:p16">
                                    <div class="flex-col">
                                        <x-input type="text" wire:model='course.course_name'
                                            :errors="$errors->first('course.course_name')" />
                                    </div>

                                    <div class="mt-4">
                                        <button
                                            class="inline-flex items-center w-full p-4 text-center text-white bg-green-400 rounded justify-items-center"><strong
                                                class="text-center">Edit Course</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- End Edit Courses -->

            <!-- Teachers Table -->
            <div class="flex items-center justify-center">
                <table class="items-center w-full bg-transparent border-collapse rounded-md shadow-md">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-left text-blue-500 uppercase align-middle border border-l-0 border-r-0 border-blue-100 border-solid bg-blue-50 whitespace-nowrap">
                                Name
                            </th>

                            <th
                                class="px-6 py-3 text-xs font-semibold text-left text-blue-500 uppercase align-middle border border-l-0 border-r-0 border-blue-100 border-solid bg-blue-50 whitespace-nowrap">
                                Email
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
                        @foreach ($teachers as $teacher)
                            <tr class="transition-colors duration-200 bg-blue-200 hover:bg-blue-300 focus:bg-blue-300">
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $teacher->name }}
                                </th>
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $teacher->email }}
                                </th>
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $teacher->created_at }}
                                </th>
                                <td
                                    class="p-4 px-6 space-x-2 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <a href="javascript:void(0)" wire:click='editTeacher({{ $teacher->id }})'
                                        class="p-2 font-black text-white uppercase transition-colors duration-150 bg-green-400 rounded-md edit_subject hover:bg-green-600 focus:bg-green-600">Edit</a>
                                    <a href="javascript:void(0)" wire:click='deleteTeacher({{ $teacher->id }})'
                                        class="p-2 font-black text-white uppercase transition-colors duration-150 bg-red-400 rounded-md delete_subject hover:bg-red-600 focus:bg-red-600">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <div>
                        {{ $courses->links() }}
                    </div>
                </table>
            </div>

            <!-- Edit Teacher -->
            @if ($editTeacherMode)
                <div x-data="{ editTeacher: false }" x-on:edit-teacher-open.window="editTeacher = true"
                    x-on:edit-teacher-close.window="editTeacher = false">
                    <div class="flex items-center justify-center">
                        <div class="w-40 h-auto p-4 bg-white rounded-md">
                            <div class="flex flex-row items-center justify-center space-x-4">
                                <form wire:submit.prevent='updateTeacher({{ $teacher }})' class="space-y-4 md:p16">
                                    <div class="flex-col">
                                        <x-input type="text" wire:model='teacher.name'
                                            :errors="$errors->first('teacher.name')" />
                                    </div>
                                    <div class="flex-col">
                                        <x-input type="text" wire:model='teacher.email'
                                            :errors="$errors->first('teacher.email')" />
                                    </div>
                                    <div class="flex-col">
                                        <x-select wire:model='teacher.user_type'
                                            :errors="$errors->first('teacher.user_type')">
                                            <x-option title="-- Choose --" />
                                            <x-option value="admin" title="Admin" />
                                            <x-option value="teacher" title="Teacher" />
                                        </x-select>
                                    </div>
                                    <div class="mt-4">
                                        <button
                                            class="inline-flex items-center w-full p-4 text-center text-white bg-green-400 rounded justify-items-center"><strong
                                                class="text-center">Edit Teacher</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- End Edit Teacher -->
            <!-- Students Table -->
            <div class="flex items-center justify-center">
                <table class="items-center w-full bg-transparent border-collapse rounded-md shadow-md">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-semibold text-left text-blue-500 uppercase align-middle border border-l-0 border-r-0 border-blue-100 border-solid bg-blue-50 whitespace-nowrap">
                                Name
                            </th>

                            <th
                                class="px-6 py-3 text-xs font-semibold text-left text-blue-500 uppercase align-middle border border-l-0 border-r-0 border-blue-100 border-solid bg-blue-50 whitespace-nowrap">
                                Email
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
                        @foreach ($students as $student)
                            <tr class="transition-colors duration-200 bg-blue-200 hover:bg-blue-300 focus:bg-blue-300">
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $student->name }}
                                </th>
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $student->email }}
                                </th>
                                <th
                                    class="p-4 px-6 text-xs text-left text-blue-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $student->created_at }}
                                </th>
                                <td
                                    class="p-4 px-6 space-x-2 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <a href="javascript:void(0)" wire:click='editStudent({{ $student->id }})'
                                        class="p-2 font-black text-white uppercase transition-colors duration-150 bg-green-400 rounded-md edit_subject hover:bg-green-600 focus:bg-green-600">Edit</a>
                                    <a href="javascript:void(0)" wire:click='deleteStudent({{ $student->id }})'
                                        class="p-2 font-black text-white uppercase transition-colors duration-150 bg-red-400 rounded-md delete_subject hover:bg-red-600 focus:bg-red-600">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <div>
                        {{-- {{ $students->links() }} --}}
                    </div>
                </table>
            </div>

            <!-- Edit Student -->
            @if ($editStudentMode)
                <div x-data="{ editStudent: false }" x-on:edit-student-open.window="editStudent = true"
                    x-on:edit-student-close.window="editStudent = false">
                    <div class="flex items-center justify-center">
                        <div class="w-40 h-auto p-4 bg-white rounded-md">
                            <div class="flex flex-row items-center justify-center space-x-4">
                                <form wire:submit.prevent='updateStudent({{ $student }})' class="space-y-4 md:p16">
                                    <div class="flex-col">
                                        <x-input type="text" wire:model='student.name'
                                            :errors="$errors->first('student.name')" />
                                    </div>
                                    <div class="flex-col">
                                        <x-input type="text" wire:model='student.email'
                                            :errors="$errors->first('student.email')" />
                                    </div>
                                    <div class="flex-col">
                                        <x-select wire:model='student.user_type'
                                            :errors="$errors->first('student.user_type')">
                                            <x-option title="-- Choose --" />
                                            <x-option value="admin" title="Admin" />
                                            <x-option value="student" title="Student" />
                                        </x-select>
                                    </div>
                                    <div class="mt-4">
                                        <button
                                            class="inline-flex items-center w-full p-4 text-center text-white bg-green-400 rounded justify-items-center"><strong
                                                class="text-center">Edit Student</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- End Edit Student -->
        </div>
    </div>
</div>
