<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}



    <section class="md:overflow-x-scroll pt-28">
        <div class="container p-5 py-12 mx-auto md:p-20 max-w-7xl">
            <div class="flex flex-wrap mx-auto md:flex-nowrap">
               @forelse ($returnData as $info)
                     <a href="">
                    <div class="flex w-full">
                        <div
                            class="relative flex flex-col items-start m-1 transition duration-300 ease-in-out delay-150 transform bg-white shadow-2xl rounded-xl md:w-80 md:hover:-translate-x-16 md:hover:-translate-y-8">
                            <img class="object-cover object-center w-full rounded-t-xl lg:h-48 md:h-36"
                                src="https://source.unsplash.com/daily?course"
                                alt="blog">
                            <div class="px-6 py-8">
                                <h4 class="mt-4 text-2xl font-semibold text-neutral-600">
                                    <span class="">
                                        {{ $info->teacher->name }}
                                    </span>
                                </h4>
                                <p class="mt-4 text-base font-normal text-cool-gray-500 leading-relax">
                                    Assign Course : {{ $info->course->course_name }}
                                </p>
                                <p class="mt-4 text-base font-normal text-cool-gray-500 leading-relax">
                                    Date : {{ $info->date }}
                                </p>
                                <p class="mt-4 text-base font-normal text-cool-gray-500 leading-relax">
                                    From : {{ $info->time_from }}
                                    To : {{ $info->time_from }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
               @empty

               @endforelse


            </div>
        </div>
    </section>


</div>
