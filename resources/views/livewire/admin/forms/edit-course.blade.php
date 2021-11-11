<div>
    {{-- Do your work, then step back. --}}
    <div class="flex flex-row items-center justify-center space-x-4">
        <form wire:submit.prevent='updateCourse({{ $course }})' class="space-y-4 md:p16">
            <div class="flex-col">
                <x-input type="text" wire:model='course.course_name' :errors="$errors->first('course.course_name')" />
            </div>

            <div class="mt-4">
                <button
                    class="inline-flex items-center w-full p-4 text-center text-white bg-green-400 rounded justify-items-center"><strong
                        class="text-center">Edit Course</strong></button>
            </div>
        </form>
    </div>
</div>
